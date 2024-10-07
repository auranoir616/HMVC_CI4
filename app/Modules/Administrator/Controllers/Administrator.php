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
        // $data['csrf_token_name'] = csrf_token();
        // $data['csrf_hash'] = csrf_hash();
    }

    public function index($filename = 'admin-dashboard')
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/login');
        }
        if(!$this->ionAuth->isAdmin()){
            return redirect()->to('/dashboard');
        }

        $viewPath = "Modules\\Administrator\\Views\\" . $filename;
        $data = [
            "template" => $this->template,
            "title" =>  $this->template->getTitle(),
            "data_group" => $this->ionAuth->getUsersGroups()->getRow(),
            "islogin" => $this->ionAuth->loggedIn(),
        ];
      return $this->template->render($viewPath, $data);
          }
    }
