<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Proposal;
use App\Models\Kegiatan;
use App\Models\User;


class DashboardUPK extends BaseController
{
    protected $kegiatan;
    protected $user;
    protected $user_model;
    
    function __construct()
    {
        $this->kegiatan = new Kegiatan();
        $this->user_model = new User();
        $this->user = $this->user_model
            ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
            ->join('ukm', 'ukm.id_user = users.id_user', 'left')
            ->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
            ->where('users.id_user', session()->get('id_user'))
            ->first();
    }
    
    public function index()
    {
        return view('dashboardUPK/listProposal');
    }

    public function listProposal()
    {
        $proposal = new Proposal();
        $data['proposal'] = $proposal->orderBy('id_proposal', 'DESC')->findAll();
        $i = 0;
        foreach ($data['proposal'] as $proposal) {
            if (isset($proposal['id_ormawa'])) {
                $namaOrganisasi = $proposal->getOrmawa($proposal['id_ormawa']);
                $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($proposal['id_ukm']))  {
                $namaOrganisasi = $proposal->getUKM($proposal['id_ukm']);
                $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($proposal['id_bidang_divisi']))  {
                $namaOrganisasi = $proposal->getBidangDivisi($proposal['id_bidang_divisi']);
                $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $namaKegiatan = $proposal->getKegiatan($proposal['id_kegiatan']);
            $data['proposal'][$i]['nama_Kegiatan'] = $namaKegiatan;

            if ($data['proposal'][$i]['acc_upk']== 0) {
                $data['proposal'][$i]['app_upk'] = "Belum Menyetujui";
            } else if ($data['proposal'][$i]['acc_upk']== 1) {
                $data['proposal'][$i]['app_upk'] = "Sudah Menyetujui";
            }
            if ($data['proposal'][$i]['acc_baak']== 0) {
                $data['proposal'][$i]['app_baak'] = "Belum Menyetujui";
            } else if ($data['proposal'][$i]['acc_baak']== 1) {
                $data['proposal'][$i]['app_baak'] = "Sudah Menyetujui";
            }
            if ($data['proposal'][$i]['untuk_wadir']== 0) {
                $data['proposal'][$i]['app_upk'] = "Tidak Perlu Persetujuan";
            } else if ($data['proposal'][$i]['untuk_wadir']== 1) {
                if ($data['proposal'][$i]['acc_upk']== 0) {
                    $data['proposal'][$i]['app_upk'] = "Belum Menyetujui";
                } else if ($data['proposal'][$i]['acc_upk']== 1) {
                    $data['proposal'][$i]['app_upk'] = "Sudah Menyetujui";
                }
            }

            $i++;
        }
        return view('DashboardUPK/listProposal', $data);
    }

    public function listLPJ()
    {
        $lpj = new LPJModel();
        $data['lpj'] = $lpj->orderBy('id_lpj', 'DESC')->findAll();
        $i = 0;
        foreach ($data['lpj'] as $lpj) {
            if (isset($lpj['id_ormawa'])) {
                $namaOrganisasi = $lpj->getOrmawa($lpj['id_ormawa']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($lpj['id_ukm']))  {
                $namaOrganisasi = $lpj->getUKM($lpj['id_ukm']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            } else if (isset($lpj['id_bidang_divisi']))  {
                $namaOrganisasi = lpj->getBidangDivisi($lpj['id_bidang_divisi']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $namaKegiatan = $lpj->getKegiatan($lpj['id_kegiatan']);
            $data['lpj'][$i]['nama_Kegiatan'] = $namaKegiatan;

            $i++;
        }
        return view('dashboardUPK/listLPJ', $data);
    }
    
    public function progresKegiatan()
    {
        $data = [
                'kegiatan' => $this->kegiatan->findAll(),
            ];
        return view('dashboardUPK/progresKegiatan', $data);
    }
}
