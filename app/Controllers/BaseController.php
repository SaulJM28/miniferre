<?php

namespace App\Controllers;

use App\Libraries\ValidationErrors;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Libraries\Encryption;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    //creacion de variables globales
    protected $data = [];
    protected $user = null;
    protected $rol = null;
    protected $login = false;
    protected $encryption;
    protected $errors;
    protected $validation;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
        /* configuracion de la libreria de encryptacion */
        $this->encryption = new Encryption;
        $this->configSession();
        /* form validation and customs errors*/ 
        $this->errors = new ValidationErrors();
        $this->validation = \Config\Services::validation();
    }

    public function configSession(){
        //obtenemos la variable de sesion
        $login = $this->session->has('login');
        /* validamos si exite true en login */
        if($login == TRUE){
            //configuracion de variables globales de sesion
            $this->login = $this->session->get('login');
            $this->user = $this->session->get('user'); 
        }
    }
}
