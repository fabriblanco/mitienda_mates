<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'home';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/intro');
        echo view('plantillas/slideimg');
        echo view('plantillas/productosDestacados');
        echo view('plantillas/categoriasPrincipales');
        echo view('plantillas/footer');

    }

     public function quienesSomos()
    {
        $data['titulo'] = 'quienesSomos';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/quienesSomos');
        echo view('plantillas/slideimg');
        echo view('plantillas/footer');
    }

    public function productos()
    {
        $data['titulo'] = 'productos';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/productosDestacados');
        echo view('plantillas/productos');
        echo view('plantillas/footer');

    }

    public function terminosYcondiciones()
    {
        $data['titulo'] = 'terminosYcondiciones';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/terminosYcondiciones');
        echo view('plantillas/footer');

    }

    public function contacto()
    {
        $data['titulo'] = 'contacto';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/contacto');
        echo view('plantillas/footer');
    }

    public function comercializacion()
    {

        $data['titulo'] = 'comercializacion';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/comercializacion');
        echo view('plantillas/footer');
    }


}
