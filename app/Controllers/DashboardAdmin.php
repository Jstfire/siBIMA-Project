<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Proposal;
use App\Models\User;

class DashboardAdmin extends BaseController
{
    public function index()
    {
        return view('dashboardAdmin/progresKegiatan');
    }

    public function listAkun()
    {
        $users = new User();
        $data['users'] = $users->orderBy('id_user', 'ASC')->findAll();
        return view('dashboardAdmin/listAkun', $data);
    }

    public function tambahAkun()
    {
        helper(['form']);
        echo view('dashboardAdmin/tambahAkun');
    }

    public function tambahAkunPost()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'password'          => 'required|min_length[3]|max_length[50]',
            'confirmpassword'   => 'matches[password]',
            'role'              => 'required',
            'nama_tampil'       => 'required'
        ];
          
        if($this->validate($rules)){
            $userModel = new User();
            $data = [
                'username'     => $this->request->getVar('username'),
                'role'     => $this->request->getVar('role'),
                'nama_tampil'     => $this->request->getVar('nama_tampil'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?php echo base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Data Berhasil Ditambahkan',
                                text: 'Akun yang Anda buat berhasil ditambahkan!',
                                icon: 'success',
                                }).then(function() {
                                    window.location = '/DashboardAdmin/TambahAkun';
                            });
                    </script>
                </body>
            </html>
            ";
        } else {
            // $data['validation'] = $this->validator;
            // echo view('/DashboardAdmin/TambahAkun', $data);
            echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?php echo base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Akun Gagal Dibuat',
                                text: 'Isian tidak sesuai dengan peraturan yang telah ditentukan!',
                                icon: 'warning',
                                }).then(function() {
                                    window.location = '/DashboardAdmin/TambahAkun';
                            });
                    </script>
                </body>
            </html>
            ";
        }
    }

    public function updateAkun()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[3]|max_length[50]',
            'password'          => 'required|min_length[3]|max_length[50]',
            'confirmpassword'   => 'matches[password]',
            'role'              => 'required',
            'nama_tampil'       => 'required'
        ];
        // dd($this->validate($rules));
          
        if($this->validate($rules)){
            $userModel = new User();
            $id = $this->request->getVar('id_user');
            $data = [
                'username'     => $this->request->getVar('username'),
                'role'     => $this->request->getVar('role'),
                'nama_tampil'     => $this->request->getVar('nama_tampil'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->update($id, $data);
            echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?php echo base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Data Berhasil Diubah',
                                text: 'Data akun berhasil Anda ubah!',
                                icon: 'success',
                                }).then(function() {
                                    window.location = '/DashboardAdmin/ListAkun';
                            });
                    </script>
                </body>
            </html>
            ";
        } else {
            // $users = new User();
            // $data['users'] = $users->orderBy('id_user', 'ASC')->findAll();
            // $data['validation'] = $this->validator;
            // return view('dashboardAdmin/listAkun', $data);
            echo "". "";
            echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?php echo base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Data Gagal Diubah',
                                text: 'Isian tidak sesuai dengan peraturan yang telah ditentukan!',
                                icon: 'warning',
                                }).then(function() {
                                    window.location = '/DashboardAdmin/ListAkun';
                            });
                    </script>
                </body>
            </html>
            ";
        }
    }

    public function deleteAkun()
    {
        helper(['form']);
        $userModel = new User();
        $id = $this->request->getVar('id_user');
        $userModel->delete($id);
        echo "
            <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <link rel='Shotcut Icon' href='<?php echo base_url(); ?>/assets/img/logoSTIS.png' type='image/png' />
                    <title>Redirect</title>
                    <link href='".base_url()."/assets/css/dashboard.css' rel='stylesheet'>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet'>
                </head>
                <body>
                    <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
                    <script>
                            swal({
                                title: 'Data Berhasil Dihapus',
                                text: 'Data akun berhasil Anda hapus!',
                                icon: 'success',
                                }).then(function() {
                                    window.location = '/DashboardAdmin/ListAkun';
                            });
                    </script>
                </body>
            </html>
            ";
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
        return view('dashboardAdmin/listProposal', $data);
    }

    public function listLPJ()
    {
        return view('dashboardAdmin/listLPJ');
    }
}
