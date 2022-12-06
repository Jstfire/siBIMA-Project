<?php
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - Progres Kegiatan</title>
<link href="<?= base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <?php
    include('sidebar.php');
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    echo session()->getFlashdata('pesan');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0 h-100">
        <h1 class="m-0">Kegiatan Anda</h1>
        <hr class="m-0">
        <button type="button" class="btn btn-primary m-2" onclick="window.location.href='<?php base_url() ?>/kegiatan/add'">Tambah Kegiatan</button>
        <table class="table" id="myTable">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Penanggung Jawab</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                use CodeIgniter\I18n\Time;

                foreach ($kegiatan as $k) : ?>
                    <tr class="text-center">
                        <td scope="row"><?= $k['nama_kegiatan'] ?></td>
                        <td><?= date("d-m-Y", strtotime($k['tanggal_kegiatan'])) ?></td>
                        <td><?= $k['tempat_kegiatan'] ?></td>
                        <td><?=  $k['penanggung_jawab_kegiatan'] ?></td>
                        <td>
                        <?php
                                $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                $timeNow =date("H:i:s");
                                // dd($k['jam_mulai']);
                                
                                $tanggal_kegiatan = $k['tanggal_kegiatan'];
                                // dd($tanggal_kegiatan);
                                if($tanggal_kegiatan > $now){
                                    echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                    if ($timeNow > $k['jam_mulai'] && $timeNow < $k['jam_akhir']) {
                                        echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                    } else if ($timeNow < $k['jam_mulai']) {
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if ($timeNow > $k['jam_akhir']) {
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                } else{
                                    echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="<?php base_url() ?>/kegiatan/edit/<?= $k['id_kegiatan'] ?>" class="btn btn-warning">Edit</a>
                            <a href="<?php base_url() ?>/kegiatan/delete/<?= $k['id_kegiatan'] ?>" class="btn btn-danger hapus">Hapus</a>
                            <a href="<?php base_url() ?>/kegiatan/detail/<?= $k['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="<?= base_url(); ?>/assets/js/sidebar.js"></script>
    <?php
    include(APPPATH . 'Views/temp/footer.php');
    ?>