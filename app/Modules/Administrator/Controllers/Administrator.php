<?php

namespace Modules\Administrator\Controllers;

use CodeIgniter\Controller;
use \IonAuth\Libraries\IonAuth; 
use App\Libraries\Template;
class Administrator extends Controller
{
    protected $session;
    protected $ionAuth;
    protected $template;
    public function __construct()
    {

        $this->session = \Config\Services::session();
        $this->ionAuth = new IonAuth(); 
        $this->template = new Template();

        // if (!$this->ionAuth->loggedIn()) {
        //     return redirect()->to('/login');
        // }
    }

    public function index($filename = 'admin-page')
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/login');
        }
        if(!$this->ionAuth->isAdmin()){
            return redirect()->to('/dashboard');
        }

        $viewPath = "Modules\\Administrator\\Views\\" . $filename;
        $data = [
            "data_group" => $this->ionAuth->getUsersGroups()->getRow(),
            "title" => ucfirst($filename),
            "islogin" => $this->ionAuth->loggedIn(),
            'greeting' => 'Hello, welcome to the home page!',
        ];
      return $this->template->render($viewPath, $data);
          }
    }
