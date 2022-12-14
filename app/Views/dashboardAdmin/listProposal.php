<?php
    include (APPPATH.'Views/temp/head.php');
?>
    <title>siBIMA - List Proposal</title>
    <link href="<?= base_url();?>/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?php
        include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List Proposal</h1><hr class="m-0 mb-3">
        <table id="tableProposal" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Organisasi</th>
                    <th scope="col">Nama</th>
                    <th scope="col">UPK</th>
                    <th scope="col">BAAK</th>
                    <th scope="col">Wadir 3</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($proposal)) :?>
                <?php foreach ($proposal as $prop) :?>
                    <tr>
                        <th scope="row"><?= $prop['id_proposal'] ?></th>
                        <td><?= $prop['nama_kegiatan'] ?></td>
                        <td><?= $prop['nama_organisasi'] ?></td>
                        <td><a href="<?= base_url(); ?>/proposal/download/<?= $prop['id_proposal']; ?>"><?= $prop['nama_proposal']; ?></a></td>
                        <td>
                            <?php
                            if ($prop['acc_upk'] == 1) {
                                echo '<button type="button" class="btn btn-success">Diterima</button>';
                            } else if ($prop['acc_upk'] == 0) {
                                echo '<button type="button" class="btn btn-danger">Ditolak</button>';
                            } else {
                                echo '<button type="button" class="btn btn-warning">Menunggu</button>';
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($prop['acc_baak'] == 1) {
                                    echo '<button type="button" class="btn btn-success">Diterima</button>';
                                } else if ($prop['acc_baak'] == 0) {
                                    echo '<button type="button" class="btn btn-danger">Ditolak</button>';
                                } else {
                                    echo '<button type="button" class="btn btn-warning">Menunggu</button>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($prop['untuk_wadir'] == 1) {
                                    if ($prop['acc_wadir'] == 1) {
                                        echo '<button type="button" class="btn btn-success">Diterima</button>';
                                    } else if ($prop['acc_wadir'] == 0) {
                                        echo '<button type="button" class="btn btn-danger">Ditolak</button>';
                                    } else {
                                        echo '<button type="button" class="btn btn-warning">Menunggu</button>';
                                    }
                                } else {
                                    echo '<button type="button" class="btn btn-secondary" disabled>Tidak Perlu</button>';
                                }
                                
                            ?>
                        </td>
                        <td>
                            <a href="<?=base_url()?>/proposal/detail/<?= $prop['id_proposal'] ?>" class="btn btn-primary">
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
    <script src="<?= base_url();?>/assets/js/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableProposal').DataTable();
        });
    </script>
<?php
    include(APPPATH.'Views/temp/footer.php');
?>