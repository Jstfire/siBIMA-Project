<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\LPJModel;
use App\Models\Proposal;
use App\Models\User;

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

    function list_lpj(){
        $data = [
            'lpj' => $this->kegiatan->where('kegiatan.id_user', session()->get('id_user'))->join('lpj', 'lpj.id_lpj = kegiatan.id_lpj', 'left')->findAll(),
        ];

        // dd($data);
        return view('dashboardUPKBAAK/listLPJ', $data);
    }
}
