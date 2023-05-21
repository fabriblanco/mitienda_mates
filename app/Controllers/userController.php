<?php

namespace App\Controllers;

use App\Models\consulta_model;

use App\Models\persona_model;

class userController extends BaseController
{

    public function formRegistro()
    {

        $data['titulo'] = 'registro';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/formRegistro');
        echo view('plantillas/footer');
    }

    public function formIniciarSesion()
    {

        $data['titulo'] = 'iniciar sesion';
        echo view('plantillas/encabezado', $data);
        echo view('plantillas/nav');
        echo view('plantillas/formIniciarSesion');
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

            $registroConsulta = new consulta_model();
            $registroConsulta->insert($data);

            return redirect()->to('contacto');
        } else {

            $data['validation'] = $this->validator;
        }
    }
    $data['titulo'] = 'contacto';
        echo view('plantillas/encabezado',$data);
        echo view('plantillas/nav');
        echo view('plantillas/contacto');
        echo view('plantillas/footer');

  }



public function registrar_persona(){
    
    $request = \config\Services::request();

    if($request->is('post')){
        $rules = [
            'nombre'=> 'required',
            'apellido'=> 'required',
            'mail'=> 'required|valid_email',
            'password'=> 'required'
        ];

        $validations = $this->validate($rules);

        if ($validations) {
            $data = [

                'persona_nombre' => $request->getPost('nombre'),
                'persona_apellido' => $request->getPost('apellido'),
                'persona_email' => $request->getPost('mail'),
                'persona_password' => $request->getPost('password')
            ];

            $registroPersona = new persona_model();
            $registroPersona->insert($data);

            return redirect()->to('formRegistro');
        } else {

            $data['validation'] = $this->validator;
        }
    }
    $data['titulo'] = 'formRegistro';
        echo view('plantillas/encabezado',$data);
        echo view('plantillas/nav');
        echo view('plantillas/formRegistro');
        echo view('plantillas/footer');

  }

}


