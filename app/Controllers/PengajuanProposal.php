<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kegiatan;
use App\Models\Proposal;
use App\Models\User;
use CodeIgniter\I18n\Time;

class PengajuanProposal extends BaseController
{
    protected $proposal;
    protected $kegiatan;
    protected $user_model;
    protected $user;

    function __construct()
    {
        $this->proposal = new Proposal();
        $this->kegiatan = new Kegiatan();
        $this->user_model = new User();
        if (session()->get('id_user') >= 2 && session()->get('id_user') <= 5) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                //->join('ukm', 'ukm.id_user = users.id_user', 'left')
                //->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
        if (session()->get('id_user') >= 9 && session()->get('id_user') <= 15) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                ->join('ukm', 'ukm.id_user = users.id_user', 'left')
                //->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
        if (session()->get('id_user') >= 16 && session()->get('id_user') <= 43) {
            $this->user = $this->user_model
                ->join('ormawa', 'ormawa.id_user = users.id_user', 'left')
                ->join('ukm', 'ukm.id_user = users.id_user', 'left')
                ->join('bidang_divisi', 'bidang_divisi.id_user = users.id_user', 'left')
                ->where('users.id_user', session()->get('id_user'))
                ->first();
        }
    }

    public function index()
    {
        return view('dashboardBPH/pengajuanProposal');
    }

    function add(){
        $data = $this->request->getPost();
        $data['tanggal_kegiatan'] = Time::parse($data['tanggal_kegiatan'])->toDateTimeString();
        $data['tahun_ajaran_kegiatan'] = '2022/2023';
        $data['bulan_kegiatan'] = explode("-", $data['tanggal_kegiatan'])[1];
        $data['id_ormawa'] = $this->user['id_ormawa'];
        $data['jam_kegiatan'] = $data['jam_mulai'] . " " . $data["jam_akhir"];
        if (isset($this->user['id_ukm'])) {
            $data['id_ukm'] = $this->user['id_ukm'];
        }
        if (isset($this->user['id_bidang_divisi'])) {
            $data['id_bidang_divisi'] = $this->user['id_bidang_divisi'];
        }
        $data['id_user'] = session()->get('id_user');
        $fileProposal = $this->request->getFile('myPDF');
        $fileName = $fileProposal->getName();
        $data['link_proposal'] = $fileName;
        $data['nama_proposal'] = $fileName;
        $fileProposal->move('proposal', $fileName);

        $this->proposal->insert($data);
        $idProp = $this->proposal->where('link_proposal', $data['link_proposal'])->first();
        $data['id_proposal'] = $idProp['id_proposal'];
        $this->kegiatan->insert($data);
        session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Mengajukan Proposal!", "success");</script>');
        return redirect()->to('DashboardBPH/ListProposal');
    }

    function download($id){
        $data = $this->proposal->find($id);
        return $this->response->download('proposal/'.$data['link_proposal'], null);
    }

    function detail($id)
    {
        $data['proposal'] = $this->proposal->where('proposal.id_proposal', $id)
        ->join('kegiatan', 'proposal.id_proposal = kegiatan.id_proposal', 'left')
        ->first();
        return view('dashboardBPH/detail-proposal', $data);
    }

    function edit($id)
    {
        $data['proposal'] = $this->proposal->where('proposal.id_proposal', $id)->first();
        $data['kegiatan'] = $this->kegiatan->where('kegiatan.id_proposal', $id)->first();
        // dd($data);
        return view('dashboardBPH/edit-proposal', $data);
    }

    function edit_act($id){
        $data = $this->request->getPost();
        $data['tanggal_kegiatan'] = Time::parse($data['tanggal_kegiatan'])->toDateTimeString();
        $data['tahun_ajaran_kegiatan'] = '2022/2023';
        $data['bulan_kegiatan'] = explode("-", $data['tanggal_kegiatan'])[1];
        $data['id_ormawa'] = $this->user['id_ormawa'];
        $data['jam_kegiatan'] = $data['jam_mulai'] . " " . $data["jam_akhir"];
        if (isset($this->user['id_ukm'])) {
            $data['id_ukm'] = $this->user['id_ukm'];
        }
        if (isset($this->user['id_bidang_divisi'])) {
            $data['id_bidang_divisi'] = $this->user['id_bidang_divisi'];
        }
        $data['id_user'] = session()->get('id_user');
        $fileProposal = $this->request->getFile('myPDF');
        $fileName = $fileProposal->getName();
        $data['link_proposal'] = $fileName;
        $data['nama_proposal'] = $fileName;
        $fileProposal->move('proposal', $fileName);

        $this->proposal->update($id, $data);
        $idProp = $this->proposal->where('link_proposal', $data['link_proposal'])->first();
        $data['id_proposal'] = $idProp['id_proposal'];
        $this->kegiatan->update($data['id_kegiatan'] ,$data);
        session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Mengubah Proposal Kegiatan!", "success");</script>');
        return redirect()->to('DashboardBPH/ListProposal');
    }

    function delete($id){
        $this->proposal->delete($id);
        session()->setFlashdata('pesan', '<script>swal("Berhasil!", "Berhasil Menghapus Proposal Kegiatan!", "success");</script>');
        return redirect()->to('/DashboardBPH/ListProposal');
    }
}
