<?php

namespace App\Controllers;

use App\Models\productos_model;

use App\Models\categoria_model;
 

class productoController extends BaseController
{

    public function productosAdmin()
    {
        if (session()->login && session()->perfil == 1) {
            $productos = new Productos_model();

            $data['productos'] = $productos->findAll();

            $data['titulo'] = 'Productos';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/navAdmin');
            echo view('plantillas/productos');
            echo view('plantillas/footer');
        } else {
            return redirect()->route('/');
        }
    }


    public function actualizar_Producto()
    {
        $request = \Config\Services::request();
        //validar los datos ingresados
        //controlar si se cambio la imagen

        $idProducto = $this->request->getPost('id_producto'); //se obtiene el id del producto a modificar
      

        if ($request->is('post')) {
            
            if($this->request->getFile('imagen')->isValid()) {
                
                $rules = [
                    'nombre' => 'required',
                    'categoria' => 'required|is_not_unique[categorias.id_categoria]',
                    'descripcion' => 'required',
                    'precio' => 'required',
                    'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
                    'stock' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $img = $this->request->getFile('imagen');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'public/img/', $nombreAleatorio);
                
                $data = [
                    'producto_nombre' => $request->getPost('nombre'),
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_categoria' => $request->getPost('categoria'),
                    'producto_imagen' => $nombreAleatorio
                ];
                

            }else {

                $rules = [
                    'nombre' => 'required',
                    'categoria' => 'required|is_not_unique[categorias.id_categoria]',
                    'descripcion' => 'required',
                    'precio' => 'required',
                    'stock' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $data = [
                    'producto_nombre' => $request->getPost('nombre'),
                    'producto_descripcion' => $request->getPost('descripcion'),
                    'producto_precio' => $request->getPost('precio'),
                    'producto_stock' => $request->getPost('stock'),
                    'producto_categoria' => $request->getPost('categoria'),
                ];
                
            }

            if ($validations) {  
                
                $productoModel = new productos_model();

                $productoModel->update($idProducto, $data);

                return redirect()->to('gestionProd')->with('Mensaje', 'Producto actualizado correctamente.');
            }else {
                
                
                $data['validation'] = $this->validator;
                $productoModel = new productos_model();
                $categoriaModel = new Categoria_model();

                $data['categorias'] = $categoriaModel->findAll();
                $data['producto'] = $productoModel->where('id_producto', $idProducto)->first();

                $data['titulo'] = 'Editar Producto';
                echo view('plantillas/encabezado', $data);
                echo view('plantillas/nav_admin');
                echo view('plantillas/editar_productos');
                echo view('plantillas/footer');
            }
        }else {
            $data['validation'] = $this->validator;
            $productoModel = new productos_model();
            $categoriaModel = new categoria_model();

            $data['marcas'] = $categoriaModel->findAll();
            $data['producto'] = $productoModel->where('id_producto', $idProducto)->first();

            $data['titulo'] = 'Editar Producto';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav_admin');
            echo view('plantillas/editar_productos');
            echo view('plantillas/footer');
        }
    }


    public function activar_Producto($id)
    {
         //Se actualiza el estado del producto
        $data= array('estado_producto' => '1');
    
        $productoModel = new productos_model();
        $productoModel->update($id, $data);
        return redirect()->to('gestionProd')->with('MensajeProducto', 'Producto actualizado correctamente.');
    }

    public function editar_Producto($id = null)
    {
        $productoModel = new productos_model();
        $categoria = new categoria_model();

        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $productoModel->where('id_producto', $id)->first();

        $data['titulo'] = 'Editar Producto';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav_admin');
        echo view('plantillas/editar_productos');
        echo view('plantillas/footer');
    }

    public function eliminar_Producto($id = null)
    {
        //Se actualiza el estado del producto
        $data = array('estado_producto' => 0);
        $productoModel = new productos_model();
        $productoModel->update($id, $data);
        return redirect()->to('gestionProd')->with('MensajeProducto', 'Producto Eliminado correctamente.');
    }

    public function gestion_prod(){

        $productoModel = new productos_model();
        $categoria = new categoria_model();

        $data['categorias'] = $categoria->findAll();
        $data['producto'] = $productoModel->join('categorias', 'categorias.id_categoria = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Gestionar Productos';

        $data['titulo'] = 'Productos';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav_admin');
        echo view('plantillas/gestionar_productos');
        echo view('plantillas/footer');

    }

}