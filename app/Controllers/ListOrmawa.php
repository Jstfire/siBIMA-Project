<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ormawa;

class ListOrmawa extends BaseController
{
    public function index()
    {
        $ormawa = new Ormawa();
        $data['ormawa'] = $ormawa->orderBy('id_ormawa', 'ASC')->findAll();
        return view('listOrmawa', $data);
    }
    public function detailOrmawa($id)
    {
        $ormawa = new Ormawa();
        $data['ormawa'] = $ormawa->where('id_ormawa', $id)->first();
        $orm = $data['ormawa'];
        $data['member'] =$ormawa->getMember($orm['id_ormawa']);
        // dd($data['member']);
        return view('detailOrmawa', $data);
    }


}
