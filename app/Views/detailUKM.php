<?php
$session = session();
include('temp/head.php');
?>
<title>siBIMA - Detail UKM</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<?php
if (isset($_SESSION["username"])) {
    include('temp/header.php');
}
include('temp/nav.php');
?>
<div class="container-fluid">
    <div class="row">
        <p class="fs-1 fw-bold mt-3 mb-1 text-center">Detail Organisasi</p>
        <hr class="hr m-auto mb-2 w-25">
        <div class="row mt-3 p-0">
            <div class="col-sm-5 mb-0 text-center p-0">
                <img src="<?= base_url(); ?>/assets/img/<?= $ukm['id_ukm'] ?>.png" width="400">
            </div>
            <div class="col my-5 py-4 ps-0 pe-5">
                <p class="display-4 fw-bold mb-0"><?= $ukm['nama_ukm'] ?></p>
                <p class="display-10 fw-bold mb-0 ms-1">Kontak : <a target="_blank" href="https://wa.me/<?= $ukm['kontak_ukm'] ?>">+<?= $ukm['kontak_ukm'] ?></a></p>
                <p class="m-0 ms-1 mb-5 ukm-desc"><?= $ukm['desc_ukm'] ?></p>
                <div class="col d-flex justify-content-end">
                    <a href="<?= base_url(); ?>/kegiatan/list/<?= $ukm['id_ukm']; ?>" class="btn btn-primary rounded-5 border-0 fs-5">Lihat Jadwal</a>
                    <a href="#anggota" class="btn btn-primary rounded-5 border-0 fs-5 ms-2">List Anggota</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-5 text-center">
        <p class="fs-1 fw-bold mb-1">List Anggota</p>
        <hr class="hr m-auto mb-1 w-25">
    </div>

    <div class="row mt-3">
        <div class="table-responsive" id="anggota">
            <table id="anggotaUKM" class="table table-striped text-center">
                <thead class="border border-2 border-start-0 border-end-0 border-dark fs-5">
                    <tr>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($member)) : ?>
                        <?php foreach ($member as $mbr) : ?>
                            <tr>
                                <td><?= $mbr['nama_mahasiswa'] ?></td>
                                <td><?= $mbr['nim_mahasiswa'] ?></td>
                                <td><?= $mbr['kelas_mahasiswa'] ?></td>
                                <td><?= $mbr['jabatan_mahasiswa'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-5 mb-3 pt-5 text-center">
        <p class="fs-1 fw-bold mb-0">Bidang Divisi</p>
        <hr class="hr m-auto mb-1 w-25">
    </div>
    <div class="text-center row row-cols g-4">
        <?php foreach ($bidangdivisi as $bd) : ?>
            <div class="col">
                <div class="card-organisasi card h-100 p-3 shadow-lg">
                    <div class="container mb-1">
                        <img src="<?= base_url(); ?>/assets/img/<?= $bd['id_bidang_divisi'] ?>.png" class="logo-organisasi" alt="Logo <?= $ukm['nama_ukm'] ?>">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-4 h-0"><?= $bd['nama_bidang_divisi'] ?></h5>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-1">
                        <a href="<?= base_url() . '/DetailBidangDivisi/' . $bd['id_bidang_divisi'] ?>" class="btn btn-primary rounded-5">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#anggotaUKM').DataTable();
    });
</script>
<?php
include('temp/footer.php');
?>