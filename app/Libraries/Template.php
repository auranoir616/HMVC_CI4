<?php
namespace App\Libraries;

class Template
{
    protected $title = '';
    

    public function render($view, $data = [])
    {
        ob_start();
        echo view($view, $data);
        $content = ob_get_clean();
        // $data['title'] = $this->getTitle();
        echo view('Modules\\Dashboard\\Views\\template\\header', $data);
        echo  $content;
        echo view('Modules\\Dashboard\\Views\\template\\footer', $data);
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

}
    // public function renderAuth($view, $data = [])
    // {
    //     echo view('Modules\\Authentication\\Views\\template\\header', $data);
    //     echo view($view, $data);
    //     echo view('Modules\\Authentication\\Views\\template\\footer', $data);
    // }

