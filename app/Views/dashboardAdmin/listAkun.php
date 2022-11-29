<?php
    include (APPPATH.'Views/temp/head.php');
?>
    <title>siBIMA - List Akun</title>
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
        <h1 class="m-0">List Akun</h1><hr class="m-0 mb-3">
        <table id="tableAccount" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Nama Tampil</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) :?>
                <tr>
                    <th scope="row"><?= $user['id_user'] ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['nama_tampil'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalChange">
                            Ganti Password
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">
                            Hapus Akun
                        </button>
                    </td>
                </tr>
            <?php endforeach ?> 
            </tbody>
        </table>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDeleteLabel">Hapus Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin untuk menghapus akun ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Change Password -->
    <div class="modal fade" id="modalChange" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalChangeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalChangeLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php if(isset($validation)):?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif;?>
                    <form class="mt-3 mx-3" action="<?php echo base_url(); ?>/DashboardAdmin/TambahAkunPost" method="post">
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
                                <option>UPK</option>
                                <option>BPH</option>
                            </select>
                        </div>
                        <div class="input-group-sm mb-1">
                            <label for="nama_tampil" class="form-label">Nama Tampilan</label>
                            <input name="nama_tampil" type="text" class="form-control" id="nama_tampil">
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableAccount').DataTable();
        });
    </script>
<?php
    include(APPPATH.'Views/temp/footer.php');
?>