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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php echo session()->getFlashdata('pesan') ?>
    <?php
    include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List Proposal</h1>
        <hr class="m-0 mb-3">
        <a href="<?= base_url(); ?>/pengajuan_proposal" class="btn btn-primary mt-3 mb-3">Tambah Proposal Kegiatan</a>
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
                            <td><a href="<?= base_url(); ?>/proposal/download/<?= $prop['id_proposal']; ?>"><?= $prop['nama_proposal']; ?></a></td>
                            <td><?= $prop['nama_kegiatan'] ?></td>
                            <td><?= $prop['nama_tampil'] ?></td>
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
                            <td><?= $prop['acc_baak'] ?></td>
                            <td><?= $prop['acc_wadir'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $prop['id_proposal'] ?>">
                                    Detail
                                </button>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
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