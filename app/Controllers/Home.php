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
        $data['act'] = $activity->orderBy('jam_mulai', 'ASC')->findAll();
        // dd($data['act'][0]);
        $i = 0;
        foreach ($data['act'] as $act) {
            if (isset($act['id_ormawa'])) {
                $namaOrganisasi = $activity->getOrmawa($act['id_ormawa']);
                $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
                // array_push($data['act'][$i], $namaOrganisasi);
            } else if (isset($act['id_ukm']))  {
                $namaOrganisasi = $activity->getUKM($act['id_ukm']);
                $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
                // array_push($data['act'][$i], $namaOrganisasi);
            } else if (isset($act['id_bidang_divisi']))  {
                $namaOrganisasi = $activity->getBidangDivisi($act['id_bidang_divisi']);
                $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
                // array_push($data['act'][$i], $namaOrganisasi);
            
            }

            $i++;
        }

        $i = 0;
        foreach ($data['act'] as $act) {
            $showAct = $activity->getActivityDone($act['tanggal_kegiatan'], $act['jam_mulai'], $act['jam_akhir']);
            // dd($showAct);
            if ($showAct == "done") {
                array_splice($data['act'], $i);
            }

            $i++;
        }
        // dd($namaOrganisasi);
        // dd($data['act']);

        echo view('index', $data);
    }
}
