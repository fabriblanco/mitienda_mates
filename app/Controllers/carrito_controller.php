<?php

namespace App\Controllers;
use App\Models\venta_model;
use App\Models\detalle_venta_model;
use App\Models\productos_model;



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

    public function guardar_venta($monto) {
        $cart = \Config\Services::cart();
        $venta = new venta_model();
        $detalle = new detalle_venta_model();
        $productos = new productos_model();


        $cart1 = $cart->contents();

        foreach ($cart1 as $item) {
            $producto = $productos->where('id_producto',$item['id'])->first();
            if($producto['producto_stock']<$item['qty']){
                return redirect()->route('ver_carrito')->with('MensajeDeCompra','no hay stock disponible');
            }
        }


        $data = array(
            'id_persona' => session()->id,
            'venta_fecha' => date('Y-m-d'),
            'venta_monto' => $monto
        );


        $venta_id = $venta->insert($data);


        
        $cart1 = $cart->contents();

        foreach($cart1 as $item) { 
            
            $detalleVenta = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price']
            ); 

            $productos->where('id_producto', $item['id'])->set('producto_stock', 'producto_stock - ' . $item['qty'], false)->update();

            $detalle->insert($detalleVenta);
        }
        $cart->destroy();
        return redirect()->to('ver_carrito')->with('MensajeDeCompra', 'Muchas gracias por tu compra');
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