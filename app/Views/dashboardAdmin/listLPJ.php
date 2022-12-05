<?php
    include (APPPATH.'Views/temp/head.php');
?>
    <title>siBIMA - List LPJ</title>
    <link href="<?php echo base_url();?>/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?php
        include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List LPJ</h1>
        <hr class="m-0 mb-3">
        <table id="tableLPJ" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Organisasi</th>
                    <th scope="col">LPJ</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($lpj)) :?>
                <?php foreach ($lpj as $elpeje) :?>
                    <tr>
                        <th scope="row"><?= $elpeje['id_lpj'] ?></th>
                        <td><?= $elpeje['nama_kegiatan'] ?></td>
                        <td><?= $elpeje['nama_organisasi'] ?></td>
                        <?php if (isset($elpeje['url_file'])) :?>
                        <td><a href="<?= base_url(); ?>/lpj/download/<?= $elpeje['id_lpj']; ?>"><?= $elpeje['url_file']; ?></a></td>
                        <?php else :?>
                            <td>Belum Ada</td>
                        <?php endif?>
                        <td>
                            <a href="<?=base_url()?>/kegiatan/detail/<?= $elpeje['id_kegiatan'] ?>" class="btn btn-primary">
                                Detail <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableLPJ').DataTable();
        });
    </script>
<?php
    include(APPPATH.'Views/temp/footer.php');
?>