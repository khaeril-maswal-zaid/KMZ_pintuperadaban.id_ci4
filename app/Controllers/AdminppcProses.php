<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
use App\Models\EndorsModel;

class AdminppcProses extends BaseController
{
    protected $session;
    protected $adminlogin;

    protected $adminmodel;
    protected $artikelmodel;
    protected $kategorimodel;
    protected $endorsmodel;

    public function __construct()
    {
        $this->session = session();

        $this->adminmodel = new AdminModel;
        $this->artikelmodel = new ArtikelModel;
        $this->kategorimodel = new KategoriModel;
        $this->endorsmodel = new EndorsModel;

        if ($this->session->get("adminlogin")) {

            //Ambil id admin login untuk queri
            $id = $this->session->get("adminlogin");
            $this->adminlogin = $this->adminmodel->where('id', $id)->first();
        }
    }
    //--------------------------------------------------------

    public function proseslogin()
    {
        $this->adminmodel = new AdminModel();

        if ($this->request->getVar('csrf_test_name')) {

            $username = stripcslashes($this->request->getVar('username'));
            $password = stripcslashes($this->request->getVar('password'));

            $numRows = $this->adminmodel->where('username', $username)->countAllResults();

            // Cek username
            if ($numRows === 1) {

                $row = $this->adminmodel->where('username', $username)->first();

                // cek password
                if (password_verify($password, $row['password'])) {

                    // jika berhasil login set session
                    $this->session->set('adminlogin', $row['id']);

                    return redirect()->to(URL . 'adminppc/' . url_title($row['nama'], '-', true));
                    exit;
                } else {
                    session()->setFlashdata('akunSalah', ['Password anda salah !', 'danger']);
                    return redirect()->to(URL . 'adminppc');
                    exit;
                }
            } //Jika username salah
            else {
                session()->setFlashdata('akunSalah', ['Username anda tidak ditemukan !', 'danger']);
                return redirect()->to(URL . 'adminppc');
                exit;
            }
        }
    }

    public function tambahArtikel()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        if ($this->request->getVar('csrf_test_name')) {

            $tanggal = date('d-m-Y');
            $yposting = date('Y');
            $waktu = date('H:i');
            
            if ($this->request->getVar('olehdefault') != "") {
                $penulis = $this->request->getVar('olehdefault');
            } else {
                $penulis = $this->request->getVar('penuliscustom');
            }
            
            if($penulis == ''){
                $penulis = 'Official Pintu Peradaban';
            }
            
            
            $this->artikelmodel->save([
                'id'            => '',

                'tanggal'       =>  $tanggal,
                'yposting'      =>  $yposting,
                'waktu'         =>  $waktu,
                'time'          =>  time(),

                'slug'          =>  url_title($this->request->getVar('judul'), '-', true),
                'judul'         =>  htmlspecialchars($this->request->getVar('judul')),
                'description'   =>  htmlspecialchars($this->request->getVar('description')),
                'srcimg'        =>  htmlspecialchars($this->request->getVar('source')),
                'picture'       =>  htmlspecialchars($this->request->getVar('fotopost')),
                'oleh'          =>  $penulis,
                'kategori'      =>  htmlspecialchars($this->request->getVar('kategori')),
                'level'         =>  htmlspecialchars($this->request->getVar('level')),

                'artikel'       =>  $this->request->getVar('artikel'),
                
                'visit'         => '50', //atur 50 dulu wkwkw
                'view'          => '1' //supaya tidak eror saat di tampilan pertama
            ]);

            session()->setFlashdata('alert', 'Artikel Berhasil Dipublikasikan');

            return redirect()->to(URL . 'adminppc/artikel/' . $this->request->getVar('kategori'));
        }
    }

    public function addkategori()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        if ($this->request->getVar('csrf_test_name')) {

            mkdir('./assets/img/artikel/' . url_title($this->request->getVar('namakategori'), '', true));

            $this->kategorimodel->save([
                'id'            => '',

                'kategori'       =>  $this->request->getVar('namakategori'),
                'icon'       =>  $this->request->getVar('icon')
            ]);

            session()->setFlashdata('alert', 'Kategori baru berhasil ditambahkan');

            return redirect()->to(URL . 'adminppc/kategori');
        }
    }

    public function deletekategori($id, $namafolder)
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        rmdir('./assets/img/artikel/' . url_title($namafolder, '', true));

        $this->kategorimodel->delete($id);

        session()->setFlashdata('alert', 'Kategori berhasil dihapus');

        return redirect()->to(URL . 'adminppc/kategori');
    }

    public function addendors()
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        if ($this->request->getVar('csrf_test_name')) {

            $this->endorsmodel->save([
                'id'            => $this->request->getVar('id'),

                'brand'        =>  $this->request->getVar('brand'),
                'idbrand'       =>  $this->request->getVar('idbrand'),
                'wa'             =>  $this->request->getVar('wa'),
                'chat'           =>  $this->request->getVar('chat'),
                'addby'             => $this->adminlogin['nama']
            ]);

            session()->setFlashdata('alert', 'Endors baru berhasil diubah');

            return redirect()->to(URL . 'adminppc/endors');
        }
    }

    public function deleteendors($id)
    {
        if (!$this->session->get("adminlogin")) {
            return redirect()->to(URL . 'adminppc');
        }

        $this->endorsmodel->delete($id);

        session()->setFlashdata('alert', 'Endors berhasil dihapus');

        return redirect()->to(URL . 'adminppc/endors');
    }

    public function queriajaxeditendors()
    {
        $id = $_POST['id'];
        return json_encode($this->endorsmodel->where('id', $id)->first());
    }

    // public function AddAdmin($data)
    // {
    //     $this->admin = new AdminModel();

    //     $nama = $this->request->getVar('nama');
    //     $member = $data['nik'];
    //     $foto = $data['wa'];
    //     $kategori = $data['devisi'];

    //     // stripcslashes == membersihakn krakter input
    //     $username = strtolower(stripcslashes($data["username"]));
    //     $password1 = $data["password1"];
    //     $password2 = $data["password2"];

    //     // username sudah ada atau belum
    //     // $result = mysqli_query($conn, "SELECT email FROM akun_admin WHERE email = '$email'");
    //     $result = $this->admin->where('username', $username)->findAll();
    //     //Codingn Dihentikan Sementara .......................
    //     if (mysqli_fetch_assoc($result)) {
    //         echo "
    // 			<script>
    // 				alert('WARNING ! email ini sudah dipakai ');
    // 			</script>
    // 			";
    //         return false;
    //     }

    //     // cek komfirmasi pasword
    //     if ($password1 !== $password2) {
    //         echo "
    // 			<script>
    // 				alert('Komfirmasi password tidak sesuai');
    // 			</script>";
    //         return false;
    //     }

    //     // enkripsi password
    //     $password_baru = password_hash($password1, PASSWORD_DEFAULT);

    //     $query = "INSERT INTO akun_admin VALUES
    // 				('', '$nama', '$nik', '$wa', '$devisi', '$email', '$password_baru', '$jk', '$a', '$fotob')
    // 				";

    //     mysqli_query($conn, $query);

    //     return mysqli_affected_rows($conn);
    // }
}
