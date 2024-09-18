<?php
namespace App\Libraries;

class Template
{
    public function render($view, $data = [])
    {
        echo view('Modules\\Dashboard\\Views\\template\\header', $data);
        echo view($view, $data);
        echo view('Modules\\Dashboard\\Views\\template\\footer', $data);
    }
    public function renderAuth($view, $data = [])
    {
        echo view('Modules\\Authentication\\Views\\template\\header', $data);
        echo view($view, $data);
        echo view('Modules\\Authentication\\Views\\template\\footer', $data);
    }
}
