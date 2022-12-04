<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Init extends Seeder
{
    public function run()
    {
        //
        $this->call('User');
        $this->call('Ormawa');
        $this->call('UKM');
        $this->call('BidangDivisi');
        $this->call('Kegiatan');
        $this->call('Lpj');

        // $this->call('JabatanDosenUPK');
    }
}
