<?php 
namespace Modules\Postdata\Models\Public_post;

use CodeIgniter\Model;
use IonAuth\Libraries\IonAuth;
use IonAuth\Models\IonAuthModel;

class Auth extends Model
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

    public function do_login()
    {
        $request = $this->request;
        $session = session();

        // Validasi form inputs
        $this->validation->setRules([
            'authentication_id' => 'required',
            'authentication_password' => 'required',
        ]);
        if (!$this->validation->withRequest($request)->run()) {
            self::$data['status']  = false;
            self::$data['message'] = implode('<br/>', $this->validation->getErrors());
        } else {
            // Cek login
            $do_login = $this->ionAuth->login($request->getPost('authentication_id'), $request->getPost('authentication_password'), true);
            if (!$do_login) {
                self::$data['status']  = false;
                self::$data['message'] = $this->ionAuth->errors();
            }

            if (self::$data['status']) {
                // Ambil grup user
                $user_group = UsersGroups();

                if ($user_group && $user_group->name === 'admin') {
                    $session->set('admin_userid', $this->ionAuth->user()->row()->id);
                }

                self::$data['message'] = 'Anda telah berhasil login. Klik OK untuk melanjutkan';
                self::$data['heading'] = 'Sukses';
                self::$data['type']    = 'success';
            } else {
                self::$data['heading'] = 'Gagal';
                self::$data['type']    = 'error';
            }
        }

        return self::$data;
    }
    public function do_register()
    {
        $request = $this->request;

        // Validasi input
        $this->validation->setRules([
            'user_nama'     => 'required',
            'user_email'    => 'required|is_unique[tb_users.email]',
            'user_username' => 'required|is_unique[tb_users.username]',
            'user_password' => 'required|min_length[6]',
        ]);

        if (!$this->validation->withRequest($request)->run()) {
            self::$data['status']  = false;
            self::$data['message'] = implode('<br/>', $this->validation->getErrors());
        } 


            // Jika validasi berhasil, masukkan data ke database
            $generateusername = $request->getPost('user_username');
            $userpass = $request->getPost('user_password');
            $useremail = $request->getPost('user_email');
            $username = str_replace(' ', '', $generateusername);

            // Data tambahan untuk disimpan
            $additional_data = [
                'email'    => $useremail,
                'username' => $username,
                'user_fullname' => $request->getPost('user_nama')
            ];
            if(self::$data['status']){
                
                $this->ionAuth->register($username, $userpass, $useremail, $additional_data, [2]);
                self::$data['message'] = 'Anda telah berhasil Register. Klik OK untuk melanjutkan';
                self::$data['heading'] = 'Sukses';
                self::$data['type']    = 'success';
            }else{
                self::$data['heading'] = 'Gagal';
                self::$data['type']    = 'error';
            }
            
            return self::$data;
        }

}
