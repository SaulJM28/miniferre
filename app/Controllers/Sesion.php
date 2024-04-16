<?php

namespace App\Controllers;

use App\Controllers\BaseController;
//aqui se debe de hacer la instancia al modelo(s)

class Sesion extends BaseController
{
    /* esta es la primera funcion que se ejecuta  */
    public function __construct()
    {
        $this->data['css'] = ['styles'];
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

        $usuario =  $this->request->getVar('usuario');
        $password =  $this->request->getVar('password');
        $pwdEncrypt =  password_hash($this->encryption->encrypt_var($password), PASSWORD_DEFAULT);

        return $this->response->setJSON([
            "msg" => 200,
            "txt" => "Bienvenido",
        ]);
    }
}