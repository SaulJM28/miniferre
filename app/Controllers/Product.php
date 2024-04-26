<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product as productModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Product extends BaseController
{

    public function __construct()
    {
        $this->modelProduct = new productModel();
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
                $id = $this->encryption->encrypt_var($product->id);
                $buttons = '<div class="btn-group" role="group" aria-label="Botones tabla productos">
                <a href = "' . base_url("form-producto") . '/' . $id . '" class="btn btn-sm btn-warning"><i class = "fas fa-edit text-white"></i></a>
                <button  type="button" class="btn btn-sm btn-danger" id = "btnDelete" ><i class = "fas fa-trash"></i></button>
              </div>';
                $product->DT_RowAttr =  array('product' => $id);
                $product->options = $buttons;
            }
            return $this->response->setJSON($dataProduct);
        }
    }
    /**
     * Funcion que sirve para mostrar el formulario, tanto para crear y editar registros
     * @param id int id del produicto
     */
    public function form($id = null)
    {
        if ($id !== null) {
            $id = $this->encryption->decrypt_var($id);
            $dataProduct = $this->modelProduct->where('id', $id)->first();
            if (!$dataProduct) {
                return 'error';
            } else {
                $dataProduct->id = $this->encryption->encrypt_var($dataProduct->id);
                $this->data['title'] = 'Editar';
                $this->data['action'] = 'editar-producto';
                $this->data['content'] = 'product/form';
                $this->data['product'] = $dataProduct;
                return view('main/main', $this->data);
            }
        } else {
            $this->data['title'] = 'Agregar';
            $this->data['action'] = 'agregar-producto';
            $this->data['content'] = 'product/form';
            return view('main/main', $this->data);
        }
    }

    public function create()
    {

        if (!$this->request->is('post')) {
            return $this->response->setJSON(['status' => responses::HTTP_BAD_REQUEST]);
        }

        $this->validation->setRule('txtCode', 'Código', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtName', 'Nombre', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtDescription', 'Descripción', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtCategory', 'Categoria', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtBrand', 'Marca', 'required', $this->errors->customErrors());

        if ($this->validation->run($this->request->getPost()) === FALSE) {
            return $this->response->setJSON([
                'status' => 'errorValidation',
                'message' => $this->validation->getErrors()
            ]);
        }

        $data = array(
            'name' => $this->request->getPost('txtName'),
            'description' => $this->request->getPost('txtDescription'),
            'category' => $this->request->getPost('txtCategory'),
            'brand' => $this->request->getPost('txtBrand'),
            'code' => $this->request->getPost('txtCode'),
            'created_at' => date('Y-m-d H:s:i')
        );

        $create = $this->modelProduct->insert($data);
        if (!$create) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Ocurrio un error a registrar el producto'
            ]);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Producto registrado con éxito, ¿Desea agregar otro producto?',
            'action' => 'create'
        ]);
    }


    public function update()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON(['status' => responses::HTTP_BAD_REQUEST]);
        }
        $id = $this->encryption->decrypt_var($this->request->getPost('product'));

        $this->validation->setRule('txtCode', 'Código', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtName', 'Nombre', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtDescription', 'Descripción', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtCategory', 'Categoria', 'required', $this->errors->customErrors());
        $this->validation->setRule('txtBrand', 'Marca', 'required', $this->errors->customErrors());

        if ($this->validation->run($this->request->getPost()) === FALSE) {
            return $this->response->setJSON([
                'status' => 'errorValidation',
                'message' => $this->validation->getErrors()
            ]);
        }

        $data = array(
            'name' => $this->request->getPost('txtName'),
            'description' => $this->request->getPost('txtDescription'),
            'category' => $this->request->getPost('txtCategory'),
            'brand' => $this->request->getPost('txtBrand'),
            'code' => $this->request->getPost('txtCode'),
            'updated_at' => date('Y-m-d H:s:i')
        );

        $update = $this->modelProduct->update($id, $data);
        if (!$update) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Ocurrio un error a actualizar el producto'
            ]);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Producto actualizado correctamente',
            'action' => 'update'
        ]);
    }

    public function delete()
    {
        if (!$this->request->is('post')) {
            return $this->response->setJSON(['status' => responses::HTTP_BAD_REQUEST]);
        }
        $id = $this->encryption->decrypt_var($this->request->getJSON()->product);
        $update = $this->modelProduct->delete($id);
        if (!$update) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Ocurrio un error a eliminar el producto'
            ]);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Producto eliminado correctamente',
            'action' => 'update'
        ]);
    }
}