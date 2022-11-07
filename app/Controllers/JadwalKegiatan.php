<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JadwalKegiatan extends BaseController
{
    public function index()
    {
        return view('jadwalKegiatan');
    }
}
