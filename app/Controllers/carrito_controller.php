<?php

namespace App\Controllers;



class carrito_controller extends BaseController
{

    public function ver_carrito()
    {
        $cart=\Config\Services::cart();
        
        $data['titulo'] = 'Productos';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav');
            echo view('plantillas/carrito_vista');
            echo view('plantillas/footer');
    }

    public function agregar_carrito() {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $data = array(
            'id' => $request->getPost('id'),
            'name' => $request->getPost('nombre'),
            'price' => $request->getPost('precio'),
            'qty' => 1,
        );
        $cart->insert($data);
        return redirect()->route('ver_carrito');
    }

    public function eliminar_item($id){
        $cart = \Config\Services::cart();
        $cart->remove($id);
        return redirect()->route('ver_carrito');
    }

    public function vaciar_carrito(){
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->route('ver_carrito');
    }



}