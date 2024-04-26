<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuario as ModelUsuarios;
//aqui se debe de hacer la instancia al modelo(s)

class Sesion extends BaseController
{
    /* esta es la primera funcion que se ejecuta  */
    public function __construct()
    {
        $this->data['css'] = ['styles'];
        $this->userModel = new ModelUsuarios();
    }

    public function index()
    {
        $this->data['js'] = ['sesion'];
        $this->data['content'] = 'sesion/login';
        return view("main/main", $this->data);
    }

    public function logIn()
    {

        if(!$this->request->is('POST')){
            $this->response->setStatusCode(404);
        }



        $email =  $this->request->getVar('email');
        $password =  $this->request->getVar('password');
        $pwdEncrypt =  password_hash($this->encryption->encrypt_var($password), PASSWORD_DEFAULT);
        $dataUser = $this->userModel->where('email', $email)->first();
        if(!$dataUser){
            return $this->response->setJSON([
                'msg' => false,
                'txt' => 'Error al iniciar sesion, asegurate que los datos sean correctos.'
            ]);
        }
        if(!password_verify($password, $dataUser->password)){
            return $this->response->setJSON([
                'msg' => false,
                'txt' => 'Erro al iniciar sesion, asegurate que los datos que ingresaste sean correctos.'
            ]);
        }
        //iniciamos la variables de sesion
        $dataSession = array(
            'login' => TRUE,
            'user' => $dataUser->name,
        );
        //asigmos la variables
        $this->session->set($dataSession);
        //validamos que se creo la sesion
        if ($this->session->get()) {
            return $this->response->setJSON([
                'msg' => true,
                'txt' => "Todo bien, inicamos sesion"
            ]);
        }

    }
}