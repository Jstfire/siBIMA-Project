<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\LPJModel;

class LPJ extends BaseController
{
    function upload($id){
        $lpj = new LPJModel();
        $data = $lpj->find($id);
        $activity = new Kegiatan();
        $act = $activity->find($data['id_lpj']);
        $fileLPJ = $this->request->getFile('myPDF');
        $fileName = "LPJ ".$act['nama_kegiatan'].".pdf";
        $data['url_file'] = $fileName;
        $fileLPJ->move('lpj', $fileName);
        // dd($data);
        $lpj->update($id, $update = [
            'url_file' => $data['url_file'],
        ]);
        session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Upload LPJ!", "success");</script>');
        return redirect()->to('/DashboardBPH/ListLPJ');
    }
    function download($id){
        $lpj = new LPJModel();
        $data = $lpj->find($id);
        return $this->response->download('lpj/'.$data['url_file'], null);
    }
}
