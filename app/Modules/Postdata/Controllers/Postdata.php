<?php

namespace Modules\Postdata\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;


class Postdata extends BaseController
{
    public function public_post($model, $method)
    {
        $model = ucfirst(preg_replace('/[^a-zA-Z0-9_]/', '', $model));
        $method = preg_replace('/[^a-zA-Z0-9_]/', '', $method);

        $modelName = '\\Modules\\Postdata\\Models\\Public_post\\' . $model;

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

    public function admin_post($model, $method)
    {
        $model = ucfirst(preg_replace('/[^a-zA-Z0-9_]/', '', $model));
        $method = preg_replace('/[^a-zA-Z0-9_]/', '', $method);

        $modelName = '\\Modules\\Postdata\\Models\\Admin_post\\' . $model;

        if (!class_exists($modelName)) {
            return $this->response->setJSON([
                'error' => 'Model tidak ditemukan',
                'nama' => $modelName,
                'tes' => class_exists($modelName)
            ], 404);
        }
        if (!is_admin()) {
            return $this->response->setJSON([
                'error' => 'tidak memiliki ijin',
            ], 403);
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
