<?php
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - Progres Kegiatan</title>
<link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
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
        <h1 class="m-0">Progres Kegiatan</h1>
        <hr class="m-0">
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
                        <td scope="row"><?php echo $k['nama_kegiatan'] ?></td>
                        <td><?php echo date("d-m-Y", strtotime($k['tanggal_kegiatan'])) ?></td>
                        <td><?php echo $k['tempat_kegiatan'] ?></td>
                        <td><?php echo  $k['penanggung_jawab_kegiatan'] ?></td>
                        <td>
                            <?php
                                $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                $tanggal_kegiatan = $k['tanggal_kegiatan'];
                                // dd($tanggal_kegiatan);
                                if($tanggal_kegiatan > $now){
                                    echo 'Belum Mulai';
                                } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                    echo 'Sedang Berjalan';
                                } else{
                                    echo 'Selesai';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="<?php base_url() ?>/kegiatan/detail/<?= $k['id_kegiatan'] ?>" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="<?php echo base_url(); ?>/assets/js/sidebar.js"></script>
    <?php
    include(APPPATH . 'Views/temp/footer.php');
    ?>
