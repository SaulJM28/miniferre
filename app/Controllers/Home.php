<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $this->data['header'] = 'main/header';
        $this->data['menu'] = 'main/menu';
        $this->data['content']  = 'dashboard/inicio';
        $this->data['css'] = ['styles'];
        $this->data['js'] = ['principal'];
        return view('main/main', $this->data);
    }
}
