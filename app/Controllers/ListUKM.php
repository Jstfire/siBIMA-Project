<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UKM;

class ListUKM extends BaseController
{
    public function index()
    {
        $ukm = new UKM();
        $data['ukm'] = $ukm->orderBy('id_ukm', 'ASC')->findAll();
        return view('listUKM', $data);
    }
}
