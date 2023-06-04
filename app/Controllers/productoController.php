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
        $precio = $this->request->getPost('precioProducto');
        $precioSinFormato = str_replace('.', '', $precio);

        if ($request->is('post')) {
            var_dump("entro1");
            
            if($this->request->getFile('imagenProducto')->isValid()) {
                var_dump("entro2");
                $rules = [
                    'nombreProducto' => 'required',
                    'marcaProducto' => 'required|is_not_unique[marca.id_marca]',
                    'descripcionProducto' => 'required',
                    'precioProducto' => 'required',
                    'imagenProducto' => 'uploaded[imagenProducto]|max_size[imagenProducto, 4096]|is_image[imagenProducto]',
                    'stockProducto' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $img = $this->request->getFile('imagenProducto');
                $nombreAleatorio = $img->getRandomName();
                $img->move(ROOTPATH . 'public/img/ejemplos', $nombreAleatorio);
                
                $data = [
                    'producto_nombre' => $request->getPost('nombreProducto'),
                    'producto_descripcion' => $request->getPost('descripcionProducto'),
                    'producto_precio' => $precioSinFormato,
                    'producto_stock' => $request->getPost('stockProducto'),
                    'producto_marca' => $request->getPost('marcaProducto'),
                    'producto_imagen' => $nombreAleatorio
                ];
                

            }else {

                $rules = [
                    'nombreProducto' => 'required',
                    'marcaProducto' => 'required|is_not_unique[marca.id_marca]',
                    'descripcionProducto' => 'required',
                    'precioProducto' => 'required',
                    'stockProducto' => 'required|is_natural'
                ];

                $validations = $this->validate($rules);

                $data = [
                    'producto_nombre' => $request->getPost('nombreProducto'),
                    'producto_descripcion' => $request->getPost('descripcionProducto'),
                    'producto_precio' => $precioSinFormato,
                    'producto_stock' => $request->getPost('stockProducto'),
                    'producto_marca' => $request->getPost('marcaProducto'),
                ];
                
            }

            if ($validations) {  
                
                $productoModel = new productos_model();

                $productoModel->update($idProducto, $data);

                return redirect()->to('gestionProductos')->with('MensajeProducto', 'Producto actualizado correctamente.');
            }else {
                $data['validation'] = $this->validator;
                $productoModel = new productos_model();
                $categoriaModel = new Categoria_model();

                $data['marcas'] = $categoriaModel->findAll();
                $data['producto'] = $productoModel->where('id_producto', $idProducto)->first();

                $data['titulo'] = 'Editar Producto';
                echo view('plantillas/encabezado', $data);
                echo view('plantillas/navAdmin');
                echo view('plantillas/editarProducto');
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
            echo view('plantillas/navAdmin');
            echo view('plantillas/editarProducto');
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
        echo view('plantillas/editarProducto');
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