<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
            'username'          => 'required|min_length[6]|max_length[50]|is_unique[users.username]',
            'password'          => 'required|min_length[6]|max_length[50]',
            'confirmpassword'   => 'matches[password]',
            'role'              => 'required|max_length[5]',
            'nama_tampil'       => 'required|min_length[6]'
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
            echo "<script>
                alert('Akun berhasil dibuat.');
                window.location.href='/DashboardAdmin/TambahAkun';
            </script>";
        } else {
            $data['validation'] = $this->validator;
            echo view('/DashboardAdmin/TambahAkun', $data);
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
            echo "<script>
                alert('Data berhasil diubah.');
                window.location.href='/DashboardAdmin/ListAkun';
            </script>";
        } else {
            // $users = new User();
            // $data['users'] = $users->orderBy('id_user', 'ASC')->findAll();
            $data['validation'] = $this->validator;
            // return view('dashboardAdmin/listAkun', $data); //bagian error nya yok
        }
    }
    
    public function listProposal()
    {
        return view('dashboardAdmin/listProposal');
    }

    public function listLPJ()
    {
        return view('dashboardAdmin/listLPJ');
    }
}
