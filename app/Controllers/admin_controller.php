<?php

namespace App\Controllers;

use App\Models\categoria_model;
use App\Models\productos_model;
use App\Models\consulta_model;




class admin_controller extends BaseController
{

    public function nav_admin()
    {

        $data['titulo'] = 'admin';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav_admin');
        echo view('plantillas/footer');
    }

    public function productosAdmin()
    {
        if (session()->login && session()->perfil == 1) {
            $productos = new productos_model();

            $data['productos'] = $productos->findAll();

            $data['titulo'] = 'Productos';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav_admin');
            echo view('plantillas/productos');
            echo view('plantillas/footer');
        } else {
            return redirect()->route('/');
        }
    }

    public function consultas_admin()
    {
        if (session()->login && session()->perfil == 1) {
            $consultas = new consulta_model();

            $data['consultas'] = $consultas->findAll();

            $data['titulo'] = 'consultas';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav_admin');
            echo view('plantillas/verConsultas_admin');
            echo view('plantillas/footer');
        } else {
            return redirect()->route('/');
        }
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

    public function vista_admin()
    {
        if (session()->login && session()->perfil == 1) {
            $data['titulo'] = 'Administrador';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav_admin');
            echo view('plantillas/footer');
        } else {
            return redirect()->route('/');
        }
    }

    public function registrar_producto()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
    
        $validation->setRules(
            [
                'nombre' => 'required',
                'categoria' => 'required|is_not_unique[categorias.id_categoria]',
                'descripcion' => 'required',
                'precio' => 'required',
                'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                'stock' => 'required|is_natural',
            ],
            [
                "nombre" => [
                    "required" => "El nombre es obligatorio.",
                ],
                "categoria" => [
                    "required" => "La categoria es obligatorio.",
                
                    "is_not_unique" => "La categoria no ha sido seleccionada.",
                ],
                "descripcion" => [
                    "required" => "La descripcion es obligatoria.",
                ],
                "imagen" => [
                    "required" => "La imagen es obligatoria.",
                    "uploaded" => "el formato no es valido",
                    "max_size" => "el tamaño no es valido",
                    "is_image" => "el archivo no es una imagen",

                ],
                "precio" => [
                    "required" => "El precio es obligatorio.",
                ],
                "stock" => [
                    "required" => "El stock es obligatorio.",
                    "is_natural" => "La contraseña contiene al menos 8 caracteres."
                ],
            ]
        );
            

        if ($validation->withRequest($this->request)->run()) {
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



