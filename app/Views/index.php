<?php

use PHPUnit\Framework\Constraint\IsNull;

use function PHPUnit\Framework\isNull;

    $session = session();
    include('temp/head.php');
?>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/index.css">
    <title>siBIMA - Halaman Utama</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    <div class="container">
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-5"><img class="img-fluid rounded mb-4 mb-lg-0" src="<?php echo base_url();?>/assets/img/logoSTIS.png" alt="Logo STIS"></div>
            <div class="col-lg-7">
                <h1 class="fw-bold text-thumbnail">siBIMA</h1>
                <h3 class="">Sistem Informasi Pembinaan Kemahasiswaan</h3>
                <p class="desc-thumb">Sistem Informasi Pembinaan Kemahasiswaan atau siBIMA merupakan suatu sistem terintegrasi yang dibangun untuk membantu salah satu proses bisnis dari UPK di Polstat STIS. siBIMA menyediakan fitur deskripsi Ormawa dan UKM secara umum, sistem pengajuan proposal oleh pihak Ormawa dan UKM, persetujuan proposal dari pihak UPK dan pimpinan terkait, serta deskripsi detail dari kegiatan dan anggota pada suatu Ormawa dan UKM.</p>
                <div class="container p-0 d-flex justify-content-end">
                    <a class="btn btn-primary btn-lg rounded-pill" href="#jadwalKegiatan">Kegiatan yang Akan Datang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div>
            <h1 class="fs-1 fw-bold m-0">Apa itu UPK?</h1><hr class="my-2 p-0" style="border: 1px solid black;">
        </div>
        <p class="desc-thumb">Unit Pembinaan Kemahasiswaan (UPK) merupakan unit yang dibentuk untuk melakukan pembinaan kepada mahasiswa Politeknik Statistika STIS. UPK mengawasi segala kegiatan diikuti oleh mahasiswa serta program kerja yang diadakan oleh setiap Unit Kegiatan Mahasiswa (UKM)  dan Organisasi Mahasiswa (Ormawa). Selain melakukan pengawasan, UPK memiliki tugas pokok berupa membuat rancangan program kegiatan pembinaan kemahasiswaan, melakukan koordinasi pembinaan mental, disiplin, dan karakter, minat dan bakat mahasiswa, melakukan koordinasi pembinaan kegiatan peningkatan softskill, dan memberikan masukan dan pertimbangan terkait penyelesaian masalah pembinaan kemahasiswaan kepada Direktur melalui Wakil Direktur III. Dalam melaksanakan tugasnya, UPK bertanggung jawab kepada Direktur Polstat STIS melalui Wakil Direktur III Kemahasiswaan.</p>
    </div>

    <div id="jadwalKegiatan" class="container py-3">
        <div>
            <h1 class="fs-2 text-center fw-bold m-0">Kegiatan yang Akan Datang</h1><hr class="my-2 p-0" style="border: 1px solid black;">
        </div>

        <div class="container rounded-3 pt-1 pb-3 px-0">
            <table class="table m-auto mt-1 py-auto">
                <thead class="table-primary fs-4 mb-1">
                    <tr>
                        <td class="p-0 ps-2">List Kegiatan</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="fs-5">
                <?php if ($act) : ?>
                    <?php foreach ($act as $act) :?>
                        <tr class="row-kegiatan pointer" onclick="window.location='<?= base_url();?>/kegiatan/detail/<?= $act['id_kegiatan']?>'";>
                            <td><?= $act['nama_kegiatan'] ?></td>
                            <td><?= $act['nama_organisasi'] ?></td>
                            <td class="txt-rgt"><?= date_format(date_create($act['tanggal_kegiatan']),"D, d F Y"). " | " .date("H.i", strtotime($act['jam_mulai']))."-".date("H.i", strtotime($act['jam_akhir']))?></td>
                        </tr>
                    <?php endforeach ?> 
                <?php else : ?>
                    <tr class="row-kegiatan pointer">
                            <td>Tidak Ada Kegiatan</td>
                            <td></td>
                            <td></td>
                        </tr>
                <?php endif ?>
                
                </tbody>
            </table>
        </div>
    </div>
<?php
    include('temp/footer.php');
?>



