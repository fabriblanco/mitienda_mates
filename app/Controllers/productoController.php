<?php

namespace App\Controllers;

use App\Models\productos_model;

use App\Models\categoria_model;
 

class productoController extends BaseController
{

    public function formProducto()
    {

        $data['titulo'] = 'registro';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/formRegistro');
        echo view('plantillas/footer');
    }



    public function registrar_consulta(){
        $request = \config\Services::request();
    
        if($request->is('post')){
            $rules = [
                'nombre'=> 'required',
                'apellido'=> 'required',
                'mail'=> 'required|valid_email',
                'mensaje'=> 'required',
                'motivo'=> 'required'
            ];
    
            $validations = $this->validate($rules);
    
            if ($validations) {
                $data = [
    
                    'consulta_nombre' => $request->getPost('nombre'),
                    'consulta_apellido' => $request->getPost('apellido'),
                    'consulta_email' => $request->getPost('mail'),
                    'consulta_motivo' => $request->getPost('motivo'),
                    'consulta_mensaje' => $request->getPost('mensaje')
                ];
    
                $registroConsulta = new productos_model();
                $registroConsulta->insert($data);
    
                return redirect()->to('contacto');
            } else {
    
                $data['validation'] = $this->validator;
            }
        }
    }
}