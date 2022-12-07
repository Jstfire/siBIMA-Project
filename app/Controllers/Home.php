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
        $data['act'] = $activity->where('status', '1')->orderBy('tanggal_kegiatan', 'ASC')->orderBy('jam_mulai', 'ASC')->findAll();
        // dd($data['act'][0]);
        $i = 0;
        foreach ($data['act'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $activity->getBidangDivisi($act['id_bidang_divisi']);
                    $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $activity->getUKM($act['id_ukm']);
                    $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $activity->getOrmawa($act['id_ormawa']);
                $data['act'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['act'] as $act) {
            $showAct[$i] = $activity->getActivityDone($act['tanggal_kegiatan'], $act['jam_mulai'], $act['jam_akhir']);
            if ($showAct[$i] == "done") {
                // array_splice($data['act'], 0, 1);
                unset($data['act'][$i]);
            }
            
            $i++;
        }

        if (count($data['act']) > 7) {
            $count = count($data['act']) - 7;
            for ($i=0; $i < $count; $i++) { 
                array_pop($data['act']);
            }
        }

        // dd(count($data['act']));
        // dd($showAct);
        // dd($namaOrganisasi);
        // dd($data['act']);

        echo view('index', $data);
    }
}
