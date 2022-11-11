<?php
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
                <h3 class="">Sistem Pembinaan Kemahasiswaan</h3>
                <p class="desc-thumb">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum sunt nulla, iusto magni, nobis dicta, perferendis quisquam earum doloribus ut aspernatur officiis amet hic repellat suscipit laborum non consequatur accusamus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam.</p>
                <div class="container p-0 d-flex justify-content-end">
                    <a class="btn btn-primary btn-lg rounded-pill" href="#jadwalKegiatan">Kegiatan Hari Ini</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3">
        <div>
            <h1 class="fs-1 fw-bold m-0">Apa itu UPK?</h1><hr class="my-2 p-0" style="border: 1px solid black;">
        </div>
        <p class="desc-thumb">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum sunt nulla, iusto magni, nobis dicta, perferendis quisquam earum doloribus ut aspernatur officiis amet hic repellat suscipit laborum non consequatur accusamus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum sunt nulla, iusto magni, nobis dicta, perferendis quisquam earum doloribus ut aspernatur officiis amet hic repellat suscipit laborum non consequatur accusamus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea natus delectus, beatae eum cupiditate voluptatum eius eligendi exercitationem, minima repellat impedit at nisi deleniti nesciunt ut optio officiis! Magnam.</p>
    </div>

    <div id="jadwalKegiatan" class="container py-3">
        <div>
            <h1 class="fs-2 text-center fw-bold m-0">Kegiatan Hari Ini</h1><hr class="my-2 p-0" style="border: 1px solid black;">
        </div>

        <div class="container bg-success bg-opacity-25 rounded-3 pt-1 pb-3 px-0">
            <table class="table m-auto py-auto">
                <thead class="table-primary fs-4 mb-1">
                    <tr>
                        <td>Hari Ini</td>
                        <td class="txt-rgt"><?= date('d-M-Y')?></td>
                    </tr>
                </thead>
                <tbody class="fs-5">
                <?php if (isset($activity)) : ?>
                    <?php foreach ($activity as $act) : ?>
                        <tr class="row-kegiatan pointer" onclick="window.location='localhost:8080'";>
                            <td><?= $act['nama_kegiatan'] ?></td>
                            <td class="txt-rgt"><?= $act['nama_ormawa']. " | " . date("H.i", strtotime($act['jam_mulai']))."-".date("H.i", strtotime($act['jam_akhir']))?></td>
                        </tr>
                    <?php endforeach ?> 
                <?php else : ?>
                    <tr><td>Tidak Ada Kegiatan</td></tr>
                <?php endif ?>
                
                </tbody>
            </table>
        </div>

    </div>
<?php
    include('temp/footer.php');
?>



