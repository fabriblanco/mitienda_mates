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

  public function verificar_usuario()
    {
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'correo' => 'required|valid_email|',
                'pass' => 'required|min_length[8]',
            ],
            [
                "correo" => [
                    "required" => "El correo es obligatorio.",
                    "valid_email" => "El formato no es correcto.",
                ],
                "pass" => [
                    "required" => "La contraseña es obligatoria.",
                    "min_length" => "La contraseña contiene al menos 8 caracteres."
                ],
            ]
        );

        if ($validation->withRequest($this->request)->run()) {

            $persona_model = new persona_model();

            $email = $request->getPost('correo');
            $pass = $request->getPost('pass');
            $user = $persona_model->where('persona_email', $email)->first();

            if ($user) {
                $pass_user = $user['persona_password'];
                $pass_verif = password_verify($pass, $pass_user);

                if ($pass_verif) {
                    $data = [
                        'id' => $user['id_persona'],
                        'nombre' => $user['persona_nombre'],
                        'apellido' => $user['persona_apellido'],
                        'perfil' => $user['id_perfil'],
                        'login' =>  TRUE
                    ];

                    $session->set($data);

                    switch ($session->get('perfil')) {
                        case '1':
                            return redirect()->route('user_admin');
                            break;
                        case '2':
                            return redirect()->route('/');
                            break;
                    }
                } else {
                    $session->setFlashdata('mensaje', 'Usuario y/o contraseña incorrecta');
                    return redirect()->route('formIniciarSesion');
                }
            } else {
                $session->setFlashdata('mensaje', 'Usuario no registrado, Usuario y/o contraseña incorrecta');
                return redirect()->route('formIniciarSesion');
            }

        } else {
            $data['validation'] = $this->validator;
            $data['titulo'] = 'Iniciar Sesión';
            echo view('plantillas/encabezado', $data);
            echo view('plantillas/nav');
            echo view('plantillas/formIniciarSesion');
            echo view('plantillas/footer');
        }
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
                'persona_password' => password_hash($request->getPost('password'), PASSWORD_BCRYPT),
                'id_perfil'=> 2

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

  



public function cerrar_sesion(){
$session = \Config\Services::session();
$session->destroy();
return redirect()->route('formIniciarSesion');
}

}


