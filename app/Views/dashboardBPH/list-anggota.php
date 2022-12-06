<?php
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - List Anggota <?= session()->get('nama_tampil'); ?></title>
<link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php echo session()->getFlashdata('pesan') ?>
    <?php
    include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List Anggota</h1>
        <hr class="m-0 mb-3">
        <table id="tableProposal" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($anggota)) : ?>
                    <?php foreach ($anggota as $a) : ?>
                        <tr>
                            <th><?= $a['nim_mahasiswa']; ?></th>
                            <th scope="row"><?= $a['nama_mahasiswa']; ?></th>
                            <td><?= $a['kelas_mahasiswa']; ?></td>
                            <td><?= $a['angkatan_mahasiswa']; ?></td>
                            <td><?= $a['jabatan_mahasiswa']; ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
        <form action="<?= base_url(); ?>/DashboardBPH/add_anggota" enctype="multipart/form-data" class="mt-5" method="post">
            <div>
                <label for="" class="h5">Import Daftar anggota</label>
                <br>
                <input type="file" name="excelAnggota" id="" class="">
            </div>
            <div>
                <button type="submit" name="kirim" class="btn btn-primary btn-lg rounded-5 border-0 py-2 px-4 mt-4">Kirim</button>
            </div>
        </form>
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