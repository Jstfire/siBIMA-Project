<?php
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - List UKM</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    <div class="container">
        <div class="row mt-5">
            <p class="text-center display-5 fw-bold mb-3">Unit Kegiatan Mahasiswa</p>
            <hr m-auto="">
        </div>
        <div class="text-center row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($ukm as $ukm) : ?>
                <div class="col">
                    <div class="card-organisasi card h-100 p-3 shadow-lg">
                        <div class="container mb-1">
                            <img src="<?= base_url();?>/assets/img/<?=$ukm['id_ukm']?>.png" class="logo-organisasi" alt="Logo <?=$ukm['nama_ukm']?>" style="height: 130px;">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title fw-bold mb-4 h-0"><?=$ukm['nama_ukm']?></h5>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-1">
                            <a href="<?= base_url().'/DetailUKM/'.$ukm['id_ukm']?>" class="btn btn-primary rounded-5">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?> 
        </div>
    </div>
<?php
    include('temp/footer.php');
?>
