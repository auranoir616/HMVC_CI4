<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \IonAuth\Libraries\IonAuth;

class AuthFilter implements FilterInterface
{
    protected $ionAuth;

    public function __construct()
    {
        $this->ionAuth = new IonAuth();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/login');
        }else{
            return redirect()->to('/admin-dashboard');
              
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the request if needed
    }
}
