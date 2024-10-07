<?php 
namespace Modules\Postdata\Models\Admin_post;

use CodeIgniter\Model;
use IonAuth\Libraries\IonAuth;
use IonAuth\Models\IonAuthModel;

class Adminpost extends Model
{
    private static $data = [
        'status'  => true,
        'message' => null,
    ];

    protected $ionAuth;
    protected $ionAuthModel;
    protected $request;
    protected $validation;

    public function __construct()
    {
        parent::__construct();
        // Inisialisasi IonAuth dan IonAuthModel
        $this->ionAuth = new IonAuth();
        $this->ionAuthModel = new IonAuthModel();
        $this->request = service('request'); 
        $this->validation = \Config\Services::validation();
        self::$data['csrf_data'] = csrf_hash();
        

    }

    function addData(){

    }

}
