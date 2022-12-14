<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidangDivisi;

class ListBidangDivisi extends BaseController
{
    public function index($id)
    {
        // dd($id);
        $bidangdivisi = new BidangDivisi();
        $data['bidangdivisi'] = $bidangdivisi->where('id_bidang_divisi', $id)->first();
        $bd = $data['bidangdivisi'];
        $data['member'] =$bidangdivisi->getMember($bd['id_bidang_divisi']);
        // dd($data['member']);
        return view('detailBidangDivisi', $data);
    }
}
