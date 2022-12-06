<?php
$session = session();
include('temp/head.php');
?>
<title>siBIMA - Detail Ormawa</title>
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
                <img src="<?= base_url(); ?>/assets/img/<?= $foto ?>.png" width="400" height="400">
            </div>
            <div class="col my-5 py-4 ps-0 pe-5">
                <p class="display-4 fw-bold mb-0"><?= $nama_organisasi ?></p>
                <p class="display-10 fw-bold mb-0">Kontak : +<?= $kontak_organisasi ?></p>
                <p class="m-0 ms-1 mb-5 ukm-desc"><?= $desc_organisasi ?></p>
                <div class="col d-flex justify-content-end">
                    <a href="#" class="btn btn-primary rounded-5 border-0 fs-5">Lihat Jadwal</a>
                    <a href="#anggota" class="btn btn-primary rounded-5 border-0 fs-5 ms-2">List Anggota</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-5 text-center">
        <p class="fs-1 fw-bold mb-1">List Kegiatan</p>
        <hr class="hr m-auto mb-1 w-25">
    </div>

    <div class="row mt-3">
        <div class="table-responsive" id="anggota">
            <table id="anggotaOrmawa" class="table table-striped text-center">
                <thead class="border border-2 border-start-0 border-end-0 border-dark fs-5">
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($kegiatan)) : ?>
                        <?php foreach ($kegiatan as $k) : ?>
                            <tr>
                                <td><?= $k['nama_kegiatan'] ?></td>
                                <td><?= date("d-m-Y", strtotime($k['tanggal_kegiatan'])) ?></td>
                                <td><?= $k['tempat_kegiatan']; ?></td>
                                <td><?= $k['penanggung_jawab_kegiatan'] ?></td>
                                <td><?= $k['kontak_penanggung_jawab_kegiatan'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#anggotaOrmawa').DataTable();
    });
</script>
<?php
include('temp/footer.php');
?>