<?php

namespace Modules\Products\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Libraries\Template;
use \IonAuth\Libraries\IonAuth;

class Products extends BaseController
{
    protected $session;
    protected $ionAuth;
    protected $template;

    public function __construct()
    {

        $this->session = \Config\Services::session();
        $this->ionAuth = new IonAuth();
        $this->template = new Template();
    }


    // PAGE
    public function view_page($page = 'add-produk')
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/login');
        }
        $viewPath = "Modules\\Products\\Views\\" . $page;
        try {
            $data = [
                "data_group" => $this->ionAuth->getUsersGroups()->getRow(),
                "islogin" => $this->ionAuth->loggedIn(),
            ];
        } catch (\Exception $e) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view($viewPath, $data);
    }

    // MODAL
    public function modal($filename = 'add-produk')
    {
    
        $viewPath = 'Modules\\Products\\Modal\\Views\\' . $filename;
    
        if (!file_exists(APPPATH . '/Modules/Products/Modal/Views/' . $filename . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($viewPath); // throw 404 exception
        }
        return view($viewPath);
    }

    //POSTDATA

    public function postdata($model, $method)
    {
        $model = ucfirst(preg_replace('/[^a-zA-Z0-9_]/', '', $model));
        $method = preg_replace('/[^a-zA-Z0-9_]/', '', $method);

        $modelName = '\\Modules\\Products\\Models\\User_post\\' . $model;

        if (!class_exists($modelName)) {
            return $this->response->setJSON([
                'error' => 'Model tidak ditemukan',
                'nama' => $modelName,
                'tes' => class_exists($modelName)
            ], 404);
        }

        $modelInstance = new $modelName();

        if (!method_exists($modelInstance, $method)) {
            return $this->response->setJSON([
                'error' => 'Method tidak ditemukan',
                'nama' => $modelInstance,
            ], 404);
        }

        $requestData = $this->request->getPost();
        $result = call_user_func_array([$modelInstance, $method], [$requestData]);

        return $this->response->setJSON($result);
    }


}
