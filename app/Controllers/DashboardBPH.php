<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\User;

class DashboardBPH extends BaseController
{
    protected $kegiatan;
    protected $user;
    protected $user_model;


    function __construct()
    {
        $this->kegiatan = new Kegiatan();
        $this->user_model = new User();
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
        // dd($this->user);
        if(session()->get('id_user') >= 2 && session()->get('id_user') <= 5){
            $data = [
                'kegiatan' => $this->kegiatan->where('id_ormawa', $this->user['id_ormawa'])->findAll(),
            ];
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $data = [
                'kegiatan' => $this->kegiatan->where('id_ukm', $this->user['id_ukm'])->findAll(),
            ];
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 24) {
            $data = [
                'kegiatan' => $this->kegiatan->where('id_bidang_divisi', $this->user['id_bidang_divisi'])->findAll(),
            ];
        }
    
        return view('dashboardBPH/progresKegiatan', $data);
    }


}
