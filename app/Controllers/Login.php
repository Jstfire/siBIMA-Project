<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;


class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new User();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('username', $username)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id_user' => $data['id_user'],
                    'username' => $data['username'],
                    'nama_tampil' => $data['nama_tampil'],
                    'role' => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url());
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/Login');
            }
        }else{
            $session->setFlashdata('msg', 'User does not exist.');
            return redirect()->to('/Login');
        }
    }
}
