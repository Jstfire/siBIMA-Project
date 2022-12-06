<?php
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - List Organisasi</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    <div class="container">
        <div class="row mt-5">
            <p class="text-center display-5 fw-bold mb-3">Organisasi Mahasiswa</p>
            <hr m-auto="">
        </div>
        <div class="text-center row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($ormawa as $orm) : ?>
                <div class="col">
                    <div class="card-organisasi card h-100 p-3 shadow-lg">
                        <div class="container mb-1">
                            <img src="<?= base_url();?>/assets/img/<?=$orm['id_ormawa']?>.png" class="logo-organisasi" alt="Logo <?=$orm['nama_ormawa']?>">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title fw-bold mb-4 h-0"><?=$orm['nama_ormawa']?></h5>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-1">
                            <a href="<?= base_url().'/DetailOrmawa/'.$orm['id_ormawa']?>"" class="btn btn-primary rounded-5">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?> 
        </div>
    </div>
<?php
    include('temp/footer.php');
?>