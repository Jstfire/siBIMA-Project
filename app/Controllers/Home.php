<?php

namespace App\Controllers;
use App\Models\Kegiatan;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $today = date("Y-m-d");
        $activity = new Kegiatan();
        $data['act'] = $activity->where('tanggal_kegiatan', $today)->orderBy('jam_mulai', 'ASC')->findAll();
        foreach ($data['act'] as $act) {
            $i = 0;
            $data['activity'] = $activity->getOrmawa($act['id_ormawa']);
            // dd($organisasi);
            $i++;
        }
        // dd($data);

        echo view('index', $data);
    }
}
