<?php 
namespace Modules\Products\Postdata;

use CodeIgniter\Model;
use IonAuth\Libraries\IonAuth;
use IonAuth\Models\IonAuthModel;

class Produk extends Model
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
        $this->ionAuth = new IonAuth();
        $this->ionAuthModel = new IonAuthModel();
        $this->request = service('request'); 
        $this->validation = \Config\Services::validation();
        self::$data['csrf_data'] = csrf_hash();
    }

    public function AddProduk()
    {
        $this->validation->setRules([
            'produk_nama' => 'required',
            'produk_stok' => 'required',
            'produk_image' => 'uploaded[produk_image]|is_image[produk_image]|max_size[produk_image,2048]' // pastikan file adalah gambar dan tidak lebih dari 2MB
        ]);
    
        if (!$this->validation->withRequest($this->request)->run()) {
            Self::$data['status'] = false;
            Self::$data['message'] = $this->validation->getErrors();
            return Self::$data;
        }
    
        // Upload file
        $file = $this->request->getFile('produk_image');
    
        if ($file->isValid() && !$file->hasMoved()) {
            $randomFileName = $file->getRandomName();
    
            $file->move(FCPATH . 'assets/produk/', $randomFileName);
    
            $thumbnailName = 'thumb_' . $randomFileName; // Create a thumbnail name
            $image = \Config\Services::image()
                        ->withFile(FCPATH . 'assets/produk/' . $randomFileName)
                        ->resize(800, 600, true)
                        ->save(FCPATH . 'assets/produk/thumbnail/' . $thumbnailName);
    
            $random_string = bin2hex(random_bytes(32));
            $data = [
                'produk_nama' => $this->request->getPost('produk_nama'),
                'produk_stok' => $this->request->getPost('produk_stok'),
                'produk_image' => $randomFileName, 
                'produk_code' => $random_string
            ];
            
            // Insert data into the database
            $db = \Config\Database::connect();
            $db->table('tb_produk')->insert($data);
    
            Self::$data['heading'] = 'Berhasil';
            Self::$data['type'] = 'success';
            Self::$data['message'] = 'Penambahan Produk Berhasil';
        } else {
            Self::$data['heading'] = 'Error';
            Self::$data['type'] = 'error';
        }
    
        return Self::$data;
    }

    public function DeleteProduk()
    {
        $code = $this->request->getPost('code');
    
        if (!$code) {
            self::$data['status'] = false;
            self::$data['heading'] = 'Error';
            self::$data['message'] = 'Kode Produk tidak valid.';
            self::$data['csrf_data'] = csrf_hash(); 
            self::$data['type'] = 'error';
        }
    
        // Cek produk di database
        $db = \Config\Database::connect();
        $builder = $db->table('tb_produk');
        $cekproduk = $builder->where('produk_code', $code)->get()->getRow();  

        if (!$cekproduk) {
            self::$data['status'] = false;
            self::$data['message'] = 'Produk Tidak Valid';
            self::$data['type'] = 'error';
        }
    
        if (self::$data['status'] ?? true) { // Memeriksa status
            if (file_exists(WRITEPATH . 'uploads/produk/' . $cekproduk->produk_image)) {
                unlink(WRITEPATH . 'uploads/produk/' . $cekproduk->produk_image);
            }
    
            if (file_exists(WRITEPATH . 'uploads/produk/thumbnail/' . $cekproduk->produk_image)) {
                unlink(WRITEPATH . 'uploads/produk/thumbnail/' . $cekproduk->produk_image);
            }
    
            // // Hapus harga produk
            // $hargaModel = new \App\Models\HargaModel(); // Pastikan untuk mengimpor model ini
            // $hargaModel->where('harga_produkid', $cekproduk->produk_id)->delete();
    
            // Hapus produk
            $builder->where('produk_code', $code)->delete();
    
            self::$data['heading'] = 'Berhasil';
            self::$data['message'] = 'Produk berhasil dihapus.';
            self::$data['type'] = 'success';
        } else {
            self::$data['heading'] = 'Error';
            self::$data['type'] = 'error';
        }
    
        return self::$data;
    }
            
}
