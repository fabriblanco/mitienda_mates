<?php

namespace App\Controllers;

use App\Models\categoria_model;
use App\Models\productos_model;

use App\Models\Consulta_model;
use App\Models\persona_model;


class admin_controller extends BaseController
{

    public function nav_admin()
    {

        $data['titulo'] = 'admin';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav_admin');
        echo view('plantillas/footer');
    }

    public function vista_carga_Productos(){
        $categoria = new categoria_model();
        $data['categorias'] = $categoria->findAll();
        $data['titulo'] = 'cargar_productos';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav_admin');
        echo view('plantillas/formProducto');
        echo view('plantillas/footer');

    }

    public function registrar_producto()
    {

        $request = \Config\Services::request();

        if ($request->is('post')) {
            $rules = [
                'nombre' => 'required',
                'categoria' => 'required|is_not_unique[categorias.id_categoria]',
                'descripcion' => 'required',
                'precio' => 'required',
                'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                'stock' => 'required|is_natural'
            ];

            $validations = $this->validate($rules);

            if ($validations) {
                $img = $this->request->getFile('imagen');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'public/img/', $nombreAleatorio);


                $data = [
                    'producto_nombre' => $request->getPost('nombre'),
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_imagen' => $nombreAleatorio,
                    'estado_producto' => 1
                ];

                $registroProducto = new productos_model();
                $registroProducto->insert($data);

                return redirect()->to('carga_productos')->with('MensajeProducto', 'Producto cargado correctamente.');
            } else {
                $data['validation'] = $this->validator;
                $categoria = new categoria_model();
                $data['categorias'] = $categoria->findAll();
                $data['titulo'] = 'cargar_productos';
                echo view('plantillas/encabezado', $data);
                echo view('plantillas/nav_admin');
                echo view('plantillas/formProducto');
                echo view('plantillas/footer');
            }
        }
    }


}
