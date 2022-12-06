<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\LPJModel;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

class DashboardBPH extends BaseController
{
    protected $kegiatan;
    protected $user;
    protected $user_model;
    protected $proposal;
    protected $lpj;

    function __construct()
    {
        $this->lpj = new LPJModel();
        $this->kegiatan = new Kegiatan();
        $this->user_model = new User();
        $this->proposal = new Proposal();
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
        if(session()->get('id_user') >= 2 && session()->get('id_user') <= 5){
            $data = [
                'kegiatan' => $this->kegiatan->where('id_ormawa', $this->user['id_ormawa'])->where('id_user', session()->get('id_user'))->findAll(),
            ];
            return view('dashboardBPH/progresKegiatan', $data);
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $data = [
                'kegiatan' => $this->kegiatan->where('id_ukm', $this->user['id_ukm'])->where('id_user', session()->get('id_user'))->findAll(),
            ];
            return view('dashboardBPH/progresKegiatan', $data);
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 24) {
            $data = [
                'kegiatan' => $this->kegiatan->where('id_bidang_divisi', $this->user['id_bidang_divisi'])->where('id_user', session()->get('id_user'))->findAll(),
            ];
            return view('dashboardBPH/progresKegiatan', $data);
        }
    }

    function list_proposal(){
        $data = [
            'proposal' => $this->kegiatan->where('kegiatan.id_user', session()->get('id_user'))->join('proposal', 'proposal.id_proposal = kegiatan.id_proposal', 'left')->findAll(),
        ];
        // dd($data);
        return view('dashboardBPH/listProposal', $data);
    }

    public function listLPJ()
    {
        $lpj = new LPJModel();
        $data['lpj'] = $lpj->where('id_user', session()->get('id_user'))->orderBy('id_lpj', 'DESC')->findAll();
        // dd($data['lpj']);
        $i = 0;
        foreach ($data['lpj'] as $elpeje) {
            $activity = new Kegiatan();
            $act = $activity->find($elpeje['id_lpj']);
            if (isset($act['id_ormawa'])) {
                $namaOrganisasi = $activity->getOrmawa($act['id_ormawa']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($act['id_ukm']))  {
                $namaOrganisasi = $activity->getUKM($act['id_ukm']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($act['id_bidang_divisi']))  {
                $namaOrganisasi = $activity->getBidangDivisi($act['id_bidang_divisi']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $namaKegiatan = $act['nama_kegiatan'];
            $idKegiatan = $act['id_kegiatan'];
            $data['lpj'][$i]['nama_kegiatan'] = $namaKegiatan;
            $data['lpj'][$i]['id_kegiatan'] = $idKegiatan;

            $i++;
        }
        return view('dashboardBPH/listLPJ', $data);
    }

    function anggota(){
        $this->mahasiswa = new Mahasiswa();
        $data = array();
        if (session()->get('id_user') >= 2 && session()->get('id_user') <= 5) {
            $data = [
                'anggota' => $this->mahasiswa->where('id_ormawa', $this->user['id_ormawa'])->findAll(),
            ];
            return view('dashboardBPH/list-anggota', $data);
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $data = [
                'anggota' => $this->mahasiswa->where('id_ukm', $this->user['id_ukm'])->findAll(),
            ];
            return view('dashboardBPH/list-anggota', $data);
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 24) {
            $data = [
                'anggota' => $this->mahasiswa->where('id_bidang_divisi', $this->user['id_bidang_divisi'])->findAll(),
            ];
            return view('dashboardBPH/list-anggota', $data);
        }
    }

    function add_anggota(){
        $this->mahasiswa = new Mahasiswa();
        if (session()->get('id_user') >= 2 && session()->get('id_user') <= 5) {
            $file_excel = $this->request->getFile('excelAnggota');
            $ext = $file_excel->getClientExtension();
            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            foreach ($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }

                $nim = $row[0];
                $nama = $row[1];
                $kelas = $row[2];
                $angkatan = $row[3];
                $jabatan = $row[4];

                $db = \Config\Database::connect();

                $cekNim = $db->table('mahasiswa')->getWhere(['nim_mahasiswa' => $nim])->getResult();

                if (count($cekNim) > 0) {
                    $simpandata = [
                        'nim_mahasiswa' => $nim, 
                        'nama_mahasiswa' => $nama, 
                        'kelas_mahasiswa' => $kelas, 
                        'angkatan_mahasiswa' => $angkatan, 
                        'jabatan_mahasiswa' => $jabatan,
                        'id_ormawa' => $this->user['id_ormawa'],
                        'id_ukm' => null,
                        'id_bidang_divisi' => null,
                    ];

                    $db->table('mahasiswa')->update($simpandata, $nim . '= nim_mahasiswa');
                } else {
                    $simpandata = [
                        'nim_mahasiswa' => $nim, 
                        'nama_mahasiswa' => $nama, 
                        'kelas_mahasiswa' => $kelas, 
                        'angkatan_mahasiswa' => $angkatan, 
                        'jabatan_mahasiswa' => $jabatan,
                        'id_ormawa' => $this->user['id_ormawa'],
                        'id_ukm' => null,
                        'id_bidang_divisi' => null,
                    ];

                    $db->table('mahasiswa')->insert($simpandata);
                }
            }
            session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Mengupdate Anggota!", "success");</script>');
            return redirect()->to('/DashboardBPH/anggota');
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $data = [
                'kegiatan' => $this->mahasiswa->where('id_ukm', $this->user['id_ukm'])->findAll(),
            ];
            return view('dashboardBPH/list-anggota', $data);
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 24) {
            $data = [
                'kegiatan' => $this->mahasiswa->where('id_bidang_divisi', $this->user['id_bidang_divisi'])->findAll(),
            ];
            return view('dashboardBPH/list-anggota', $data);
        }
    }
}
