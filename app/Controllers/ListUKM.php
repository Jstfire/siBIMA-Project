<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Seeds\BidangDivisi;
use App\Models\UKM;

class ListUKM extends BaseController
{
    public function index()
    {
        $ukm = new UKM();
        $data['ukm'] = $ukm->orderBy('id_ukm', 'ASC')->findAll();
        return view('listUKM', $data);
    }

    public function detailUKM()
    {
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
            // echo $ID;
        }
        // dd($id);
        $ukm = new UKM();
        $data['ukm'] = $ukm->where('id_ukm', $id)->first();
        $orm = $data['ukm'];
        $data['member'] =$ukm->getMember($orm['id_ukm']);
        $data['bidangdivisi'] =$ukm->getBidangDivisi($orm['id_ukm']);
        // dd($data['member']);
        return view('detailUKM', $data);
    }
}
