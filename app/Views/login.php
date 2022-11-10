<?php
    include('temp/head.php');
?>
    <title>siBIMA - Login</title>
    <link href="<?php echo base_url();?>/assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
    <div class="container">
        <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-4 my-4">
            <div class="card-body p-4 p-sm-5">
                <div class="container text-center mb-5 mt-3">
                    <a href="<?php echo base_url();?>">
                        <p class="fw-bold m-0">siBIMA</p>
                        <p class="m-0 text-desc">Sistem Pembinaan Mahasiswa</p>
                    </a>
                </div>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
                <form class="mt-5" action="<?php echo base_url(); ?>/Login/LoginAuth" method="post">
                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="d-grid mt-5">
                        <button class="btn btn-primary btn-login text-uppercase fw-bold rounded-pill mt-5" type="submit">Login</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>

</html>