<?php

namespace Modules\Modal\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Template;
use \IonAuth\Libraries\IonAuth; 

class Modal extends BaseController
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
    public function admin($filename = 'null')
    {
        if (!$this->ionAuth->isAdmin()) {
            return '404';// redirect to 403 page or handle unauthorized access
        }
    
        $viewPath = 'Modules\\Modal\\Views\\admin\\' . $filename;
    
        if (!file_exists(APPPATH . '/Modules/Modal/Views/admin/' . $filename . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($viewPath); // throw 404 exception
        }
    
        return  view($viewPath); // load view with updated view() helper in CI4
    }
    
    public function member($filename = 'null')
    {
        // if (!$this->ionAuth->isAdmin()) {
        //     return '404';// redirect to 403 page or handle unauthorized access
        // }
    
        $viewPath = 'Modules\\Modal\\Views\\member\\' . $filename;
    
        if (!file_exists(APPPATH . '/Modules/Modal/Views/member/' . $filename . '.php')) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($viewPath); // throw 404 exception
        }
    
        return  view($viewPath); // load view with updated view() helper in CI4
    }

}
