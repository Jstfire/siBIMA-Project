<?php

namespace App\Controllers;

use App\Models\Kegiatan as ModelsKegiatan;
use App\Models\User;
use CodeIgniter\I18n\Time;

class Kegiatan extends BaseController
{
    protected $user_model;
    protected $user;
    protected $kegiatan;

    function __construct()
    {
        $this->user_model = new User();
        $this->kegiatan = new ModelsKegiatan();
        if (session()->get('id_user') >= 2 && session()->get('id_user') <= 5) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                //->join('ukm', 'ukm.id_user = users.id_user', 'left')
                //->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                ->join('ukm', 'ukm.id_user = users.id_user', 'left')
                //->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 24) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                ->join('ukm', 'ukm.id_user = users.id_user', 'left')
                ->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
    }

    public function index()
    {
        return view('index');
    }

    public function add()
    {
        return view('DashboardBPH/tambahKegiatan');
    }

    public function add_act()
    {
        $data = $this->request->getPost();
        $data['tanggal_kegiatan'] = Time::parse($data['tanggal_kegiatan'])->toDateTimeString();
        $data['tahun_ajaran_kegiatan'] = '2022/2023';
        $data['bulan_kegiatan'] = explode("-", $data['tanggal_kegiatan'])[1];
        $data['id_ormawa'] = $this->user['id_ormawa'];
        $data['jam_kegiatan'] = $data['jam_mulai'] . " " . $data["jam_akhir"];
        if (isset($this->user['id_ukm'])) {
            $data['id_ukm'] = $this->user['id_ukm'];
        }
        if(isset($this->user['id_bidang_divisi'])){
            $data['id_bidang_divisi'] = $this->user['id_bidang_divisi'];
        }

        $this->kegiatan->insert($data);

        session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Menambah Kegiatan!", "success");</script>');
        return redirect()->to('/DashboardBPH');
    }
}
