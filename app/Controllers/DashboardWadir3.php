<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Proposal;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\LPJModel;

class DashboardWadir3 extends BaseController
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
        $this->checking = $this->kegiatan
            ->join('lpj', 'lpj.id_lpj = kegiatan.id_lpj')
            ->findAll();
        foreach ($this->checking as $cek) {
            if (!isset($cek['id_proposal'])) {
                $data = [
                    'status'     => true,
                ];
                $this->kegiatan->update($cek['id_kegiatan'], $data);
            } else {
                $this->validKegiatan = $this->kegiatan
                ->join('proposal', 'proposal.id_proposal = kegiatan.id_proposal')
                ->join('lpj', 'lpj.id_lpj = kegiatan.id_lpj')
                ->find($cek['id_kegiatan']);
                // dd($this->validKegiatan);
                // $tes = '2';
                // print_r($tes);
                if ($this->validKegiatan['untuk_wadir'] == 0) {
                    if ($this->validKegiatan['acc_upk'] == 1 && $this->validKegiatan['acc_baak'] == 1) {
                        $data = [
                            'status'     => '1',
                        ];
                        $this->kegiatan->update($cek['id_kegiatan'], $data);
                    } else {
                        $data = [
                            'status'     => '0',
                        ];
                        $this->kegiatan->update($cek['id_kegiatan'], $data);
                    }
                } else {
                    if ($this->validKegiatan['acc_upk'] == 1 && $this->validKegiatan['acc_baak'] == 1 && $this->validKegiatan['acc_wadir'] == 1) {
                        $data = [
                            'status'     => '1',
                        ];
                        $this->kegiatan->update($cek['id_kegiatan'], $data);
                    } else {
                        $data = [
                            'status'     => '0',
                        ];
                        $this->kegiatan->update($cek['id_kegiatan'], $data);
                    }
                }    
            }
        }
    }

    public function listProposal()
    {
        $proposal = new Proposal();
        $data['proposal'] = $proposal->where('untuk_wadir','1')->orderBy('id_proposal', 'DESC')->findAll();
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
        return view('dashboardWadir3/listProposal', $data);
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
        return view('dashboardWadir3/listLPJ', $data);
    }
    
    public function progresKegiatan()
    {
        $data = [
                'kegiatan' => $this->kegiatan->where('status', '1')->findAll(),
            ];
        return view('dashboardWadir3/progresKegiatan', $data);
    }

    public function setujuWadir3()
    {
        helper(['form']);
        $proposal = new Proposal();
        $id = $this->request->getVar('id_proposal');
        $data = [
            'acc_wadir'     => $this->request->getVar('accept'),
        ];
        $proposal->update($id, $data);
        
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
                                    window.location = '/DashboardWadir3/ListProposal';
                            });
                    </script>
                </body>
            </html>
            ";
    }
    
    public function tolakWadir3()
    {
        helper(['form']);
        $proposal = new Proposal();
        $id = $this->request->getVar('id_proposal');
        $data = [
            'acc_wadir'     => $this->request->getVar('refuse'),
        ];
        $proposal->update($id, $data);
        
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
                                    window.location = '/DashboardWadir3/ListProposal';
                            });
                    </script>
                </body>
            </html>
            ";
    }
}
