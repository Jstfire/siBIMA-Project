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
        $i = 0;
        foreach ($data['monday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['monday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['monday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['monday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['tuesday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['tuesday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['tuesday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['tuesday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['wednesday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['wednesday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['wednesday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['wednesday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['thursday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['thursday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['thursday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['thursday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['friday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['friday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['friday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['friday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['saturday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['saturday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['saturday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['saturday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }

        $i = 0;
        foreach ($data['sunday'] as $act) {
            if (isset($act['id_ukm']))  {
                if (isset($act['id_bidang_divisi']))  {
                    $namaOrganisasi = $this->kegiatan->getBidangDivisi($act['id_bidang_divisi']);
                    $data['sunday'][$i]['nama_organisasi'] = $namaOrganisasi;
                } else {
                    $namaOrganisasi = $this->kegiatan->getUKM($act['id_ukm']);
                    $data['sunday'][$i]['nama_organisasi'] = $namaOrganisasi;
                }
            } else {
                $namaOrganisasi = $this->kegiatan->getOrmawa($act['id_ormawa']);
                $data['sunday'][$i]['nama_organisasi'] = $namaOrganisasi;
            }

            $i++;
        }
        return view('jadwalKegiatan', $data);
    }
}
