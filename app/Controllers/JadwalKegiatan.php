<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;

class JadwalKegiatan extends BaseController
{
    function __construct()
    {
        $this->kegiatan = new Kegiatan();
    }
    public function index()
    {
        $baseday    = strtotime('last monday', strtotime('tomorrow'));
        $monday     = date('Y-m-d', strtotime('last monday', strtotime('tomorrow')));
        $tuesday    = date('Y-m-d', strtotime('+1 days', $baseday));
        $wednesday  = date('Y-m-d', strtotime('+2 days', $baseday));
        $thursday   = date('Y-m-d', strtotime('+3 days', $baseday));
        $friday     = date('Y-m-d', strtotime('+4 days', $baseday));
        $saturday   = date('Y-m-d', strtotime('+5 days', $baseday));
        $sunday     = date('Y-m-d', strtotime('+6 days', $baseday));
        $data = [
            'monday' => $this->kegiatan->where('tanggal_kegiatan', $monday)->findAll(),
            'tuesday' => $this->kegiatan->where('tanggal_kegiatan', $tuesday)->findAll(),
            'wednesday' => $this->kegiatan->where('tanggal_kegiatan', $wednesday)->findAll(),
            'thursday' => $this->kegiatan->where('tanggal_kegiatan', $thursday)->findAll(),
            'friday' => $this->kegiatan->where('tanggal_kegiatan', $friday)->findAll(),
            'saturday' => $this->kegiatan->where('tanggal_kegiatan', $saturday)->findAll(),
            'sunday' => $this->kegiatan->where('tanggal_kegiatan', $sunday)->findAll(),
        ];
        return view('jadwalKegiatan', $data);
    }
}
