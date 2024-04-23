<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as prductModel;

class Product extends BaseController
{

    public function __construct()
    {
        $this->modelProduct = new prductModel();

        $this->data['header'] = 'main/header';
        $this->data['active'] = 'product';
        $this->data['menu'] = 'main/menu';
        $this->data['css'] = ['datatables.min'];
        $this->data['js'] = ['datatables.min', 'product/product'];
    }

    public function index()
    {
        $this->data['content'] = 'product/main';
        return view('main/main', $this->data);
    }


    public function store()
    {
        $dataProduct = $this->modelProduct->findAll();
        if (!$dataProduct) {
            return 'error';
        } else {

            foreach ($dataProduct as $key => $product) {

                $buttons = '<div class="btn-group" role="group" aria-label="Botones tabla productos">
                <a href = "base_url()?producto='. $this->encryption->encrypt_var($product->id) .'" class="btn btn-sm btn-warning"><i class = "fas fa-edit text-white"></i></a>
                <button type="button" class="btn btn-sm btn-danger"><i class = "fas fa-trash"></i></button>
              </div>';
                $product->options = $buttons;

            }

            return $this->response->setJSON($dataProduct);
        }
    }
}