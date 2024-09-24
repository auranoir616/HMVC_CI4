<?php

namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Libraries\Template;
use \IonAuth\Libraries\IonAuth; 

class Dashboard extends BaseController
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
    public function index()
    {
        
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/login');
        }
        // if(!$this->ionAuth->isAdmin()){
        //     return redirect()->to('/dashboard');
        // }
        $viewPath = "Modules\\Dashboard\\Views\\pages\\dashboard";
        $data = [];

        return $this->template->render($viewPath, $data);
    }

public function view_page($page = 'dashboard')
{
    if (!$this->ionAuth->loggedIn()) {
        return redirect()->to('/login');
    }
    // if(!$this->ionAuth->isAdmin()){
    //     return redirect()->to('/dashboard');
    // }

    $viewPath = "Modules\\Dashboard\\Views\\pages\\" . $page;
    try {
        $data = [
            "data_group" => $this->ionAuth->getUsersGroups()->getRow(),
            "title" => ucfirst($page),
            "islogin" => $this->ionAuth->loggedIn(),
            'greeting' => 'Hello, welcome to the home page!',
        ];
    } catch (\Exception $e) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return $this->template->render($viewPath, $data);
}

}
