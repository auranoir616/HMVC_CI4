<?php

namespace Modules\Authentication\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Libraries\Template;
use \IonAuth\Libraries\IonAuth; 

class Authentication extends BaseController
{
    protected $session;
    protected $ionAuth;
    protected $template;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ionAuth = new IonAuth(); 
        $this->template = new Template();
        // if ($this->ionAuth->loggedIn()) {
        //     return redirect()->to('admin/admin-dashboard');
        // }
    }

    public function login($page = 'login')
    {
        if ($this->ionAuth->loggedIn()) {
            return redirect()->to('admin/admin-dashboard');
        }
        $viewPath = "Modules\\Authentication\\Views\\" . $page;
    
        if (!view($viewPath, [])) {
            throw PageNotFoundException::forPageNotFound();
        }
    $data = [
        'title' => ucfirst($page),
        'islogin' => $this->ionAuth->loggedIn(),
        'greeting' => 'Hello, welcome to the home page!',
    ];
        return $this->template->render($viewPath, $data);
    }
    
    public function register($page = 'signup')
    {
        if ($this->ionAuth->loggedIn()) {
            return redirect()->to('admin/admin-dashboard');
        }

        $viewPath = "Modules\\Authentication\\Views\\" . $page;
       if (!view($viewPath, [])) {
            throw PageNotFoundException::forPageNotFound();
        }
        $db = \Config\Database::connect();
        $content = view($viewPath, ['title' => ucfirst($page), 'db' => $db]);
        $data = [
            "title" => ucfirst($page),
            "content" => $content,
            "islogin" => $this->ionAuth->loggedIn()

        ];
        return $this->template->render($viewPath, $data);
    }

    public function logout()
    {
        $this->ionAuth->logout();
        $this->session->destroy();
        return $this->response->redirect(site_url('login'));
    }


}
