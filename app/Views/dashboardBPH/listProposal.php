<?php
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - List Proposal</title>
<link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List Proposal</h1>
        <hr class="m-0 mb-3">
        <a href="" class="btn btn-primary mt-3 mb-3">Tambah Proposal Kegiatan</a>
        <table id="tableProposal" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Organisasi</th>
                    <th scope="col">Nama Proposal</th>
                    <th scope="col">UPK</th>
                    <th scope="col">BAAK</th>
                    <th scope="col">Wadir 3</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($proposal)) : ?>
                    <?php foreach ($proposal as $prop) : ?>
                        <tr>
                            <th scope="row"><?= $prop['id_proposal'] ?></th>
                            <td><?= $prop['nama_proposal'] ?></td>
                            <td><?= $prop['nama_tampil'] ?></td>
                            <td><?= $prop['acc_upk'] ?></td>
                            <td><?= $prop['acc_baak'] ?></td>
                            <td><?= $prop['acc_wadir'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $prop['id_proposal'] ?>" onclick="funcRole('role<?= $prop['id_proposal'] ?>','<?= $prop['role'] ?>')">
                                    Download PDF
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $prop['id_proposal'] ?>">
                                    Detail
                                </button>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger"></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <th scope="row">Tidak Ada Proposal yang Masuk</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/sidebar.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableProposal').DataTable();
        });
    </script>
    <?php
    include(APPPATH . 'Views/temp/footer.php');
    ?>