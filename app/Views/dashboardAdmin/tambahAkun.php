<?php
    include (APPPATH.'Views/temp/head.php');
?>
    <title>siBIMA - Tambah Akun</title>
    <link href="<?= base_url();?>/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php
        include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">Tambah Akun</h1><hr class="m-0">
        <?php if(isset($validation)):?>
            <div class="alert alert-warning">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        <form class="mt-3 mx-3" action="<?= base_url(); ?>/DashboardAdmin/TambahAkunPost" method="post">
            <div class="input-group-sm mb-1">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username">
            </div>
            <div class="input-group-sm mb-1">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="input-group-sm mb-1">
                <label for="password" class="form-label">Konfirmasi Password</label>
                <input name="confirmpassword" type="password" class="form-control" id="confpassword">
            </div>
            <div class="input-group-sm mb-1">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select">
                <option>--Pilih Role--</option>
                <option>Admin</option>
                <option>Direktur</option>
                <option>Wakil Direktur 3</option>
                <option>UPK</option>
                <option>BAAK</option>
                <option>BPH</option>
                </select>
            </div>
            <div class="input-group-sm mb-1">
                <label for="nama_tampil" class="form-label">Nama Tampilan</label>
                <input name="nama_tampil" type="text" class="form-control" id="nama_tampil">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Tambahkan Akun</button>
        </form>
    </div>

    <script src="<?= base_url();?>/assets/js/sidebar.js"></script>
<?php
    include(APPPATH.'Views/temp/footer.php');
?>