<?php
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo base_url();?>/assets/css/all-style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark p-1">
    <div class="container-fluid">
        <a class="navbar-brand ms-3" href="#">
            <p class="m-0 fs-5 fw-bold">siBIMA</p>
            <p class="m-0 fs-6">Sistem Pembinaan Kemahasiswaan</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="justify-content-end collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <?php
                    if ($url == base_url().'/') {
                        echo '<a class="nav-link active fw-semibold" aria-current="page" href="'.base_url().'">Halaman Utama</a>';
                    } else {
                        echo '<a class="nav-link fw-semibold" aria-current="page" href="'.base_url().'">Halaman Utama</a>';
                    }
                ?>
            </li>
            <li class="nav-item">
            <?php
                    if ($url == base_url().'/ListOrganisasi') {
                        echo '<a class="nav-link active fw-semibold" aria-current="page" href="'.base_url().'/ListOrganisasi">List Organisasi</a>';
                    } else {
                        echo '<a class="nav-link fw-semibold" aria-current="page" href="'.base_url().'/ListOrganisasi">List Organisasi</a>';
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if ($url == base_url().'/PengajuanProposal') {
                        echo '<a class="nav-link active fw-semibold" aria-current="page" href="'.base_url().'/PengajuanProposal">Pengajuan Proposal</a>';
                    } else {
                        echo '<a class="nav-link fw-semibold" aria-current="page" href="'.base_url().'/PengajuanProposal">Pengajuan Proposal</a>';
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if ($url == base_url().'/JadwalKegiatan') {
                        echo '<a class="nav-link active fw-semibold" aria-current="page" href="'.base_url().'/JadwalKegiatan">Jadwal Kegiatan</a>';
                    } else {
                        echo '<a class="nav-link fw-semibold" aria-current="page" href="'.base_url().'/JadwalKegiatan">Jadwal Kegiatan</a>';
                    }
                ?>
            </li>
            <li class="nav-item login">
                <a class="btn btn-primary btn-lg nav-link fw-semibold px-3 mx-2" href="">
                    Login
                </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>