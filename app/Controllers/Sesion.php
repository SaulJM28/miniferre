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
        $this->data['content'] = 'sesion/login';
        return view("main/main", $this->data);
    }
}
