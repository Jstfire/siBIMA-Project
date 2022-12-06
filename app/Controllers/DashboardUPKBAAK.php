<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Proposal;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\LPJModel;

class DashboardUPKBAAK extends BaseController
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

    public function listProposal()
    {
        $proposal = new Proposal();
        $data['proposal'] = $proposal->orderBy('id_proposal', 'DESC')->findAll();
        $i = 0;
        foreach ($data['proposal'] as $prop) {
            $activity = new Kegiatan();
            $act = $activity->find($prop['id_proposal']);
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $activity->getBidangDivisi($act['id_bidang_divisi']);
                    $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $activity->getUKM($act['id_ukm']);
                    $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $activity->getOrmawa($act['id_ormawa']);
                $data['proposal'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $namaKegiatan = $proposal->getKegiatan($act['id_kegiatan']);
            $data['proposal'][$i]['nama_kegiatan'] = $namaKegiatan;
            
            $i++;
        }
        return view('dashboardUPKBAAK/listProposal', $data);
    }

    public function listLPJ()
    {
        $lpj = new LPJModel();
        $data['lpj'] = $lpj->orderBy('id_lpj', 'DESC')->findAll();
        // dd($data['lpj']);
        $i = 0;
        foreach ($data['lpj'] as $elpeje) {
            $activity = new Kegiatan();
            $act = $activity->find($elpeje['id_lpj']);

            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $activity->getBidangDivisi($act['id_bidang_divisi']);
                    $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $activity->getUKM($act['id_ukm']);
                    $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $activity->getOrmawa($act['id_ormawa']);
                $data['lpj'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $namaKegiatan = $act['nama_kegiatan'];
            $idKegiatan = $act['id_kegiatan'];
            $data['lpj'][$i]['nama_kegiatan'] = $namaKegiatan;
            $data['lpj'][$i]['id_kegiatan'] = $idKegiatan;

            $i++;
        }
        return view('dashboardUPKBAAK/listLPJ', $data);
    }
    
    public function progresKegiatan()
    {
        $data = [
                'kegiatan' => $this->kegiatan->findAll(),
            ];
        return view('dashboardUPKBAAK/progresKegiatan', $data);
    }

    public function setujuUPKBAAK()
    {
        helper(['form']);
        $proposal = new Proposal();
        $id = $this->request->getVar('id_proposal');
        $role = $this->request->getVar('role');

        if ($role == 'UPK') {
            $data = [
                'acc_upk'     => $this->request->getVar('accept'),
            ];
            $proposal->update($id, $data);
        } else if ($role == 'BAAK') {
            $data = [
                'acc_baak'     => $this->request->getVar('accept'),
            ];
            $proposal->update($id, $data);
        }
        
        echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?= base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Aksi Berhasil Dilakukan',
                                text: 'Anda berhasil menyetujui proposal!',
                                icon: 'success',
                                }).then(function() {
                                    window.location = '/DashboardUPKBAAK';
                            });
                    </script>
                </body>
            </html>
            ";
    }
    
    public function tolakUPKBAAK()
    {
        helper(['form']);
        $proposal = new Proposal();
        $id = $this->request->getVar('id_proposal');
        $role = $this->request->getVar('role');

        if ($role == 'UPK') {
            $data = [
                'acc_upk'     => $this->request->getVar('refuse'),
            ];
            $proposal->update($id, $data);
        } else if ($role == 'BAAK') {
            $data = [
                'acc_baak'     => $this->request->getVar('refuse'),
            ];
            $proposal->update($id, $data);
        }
        
        echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?= base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Aksi Berhasil Dilakukan',
                                text: 'Anda berhasil menolak proposal!',
                                icon: 'success',
                                }).then(function() {
                                    window.location = '/DashboardUPKBAAK';
                            });
                    </script>
                </body>
            </html>
            ";
    }
}
