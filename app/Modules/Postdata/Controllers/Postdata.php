<?php
namespace Modules\Postdata\Controllers; 

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Postdata extends BaseController
{
    public function public_post($model, $method)
    {
        // Bersihkan nama model dan method untuk keamanan
        $model = ucfirst(preg_replace('/[^a-zA-Z0-9_]/', '', $model));
        $method = preg_replace('/[^a-zA-Z0-9_]/', '', $method);

        // Tentukan namespace model
        $modelName = '\\Modules\\Postdata\\Models\\Public_post\\' . $model;

        // Cek apakah model tersebut ada
        if (!class_exists($modelName)) {
            return $this->response->setJSON([
                'error' => 'Model tidak ditemukan',
                'nama' => $modelName,
                'tes' => class_exists($modelName)
        ], 404);
        }

        // Inisialisasi model
        $modelInstance = new $modelName();

        // Cek apakah method tersebut ada di model
        if (!method_exists($modelInstance, $method)) {
            return $this->response->setJSON([
                'error' => 'Method tidak ditemukans',
                'nama' => $modelInstance,
            ], 404);
        }

        // Panggil method di model dengan argumen dari POST
        $requestData = $this->request->getPost();
        $result = call_user_func_array([$modelInstance, $method], [$requestData]);

        // Kembalikan hasil sebagai JSON
        return $this->response->setJSON($result);
    }
}
