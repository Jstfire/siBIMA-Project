<?php
    $session = session();
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   

    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];
    ?>

<body id="body-pd">
  <header class="header" id="header">
    <div class="header_toggle">
      <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <div class="d-flex mt-1">
      <div class="me-3">
        <p class="user-detail m-0 text-end"><?= $session->get('nama_tampil') ?></p>
        <p class="user-detail m-0 text-end"><?= $session->get('role') ?></p>
      </div>
      <!-- <div class="header_img">
        <img src="https://i.imgur.com/hczKIze.jpg" alt="">
      </div> -->
    </div>
  </header>
  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="<?php echo base_url();?>/DashboardAdmin" class="nav_logo">
          <i class='bx bx-layer nav_logo-icon'></i>
          <span class="nav_logo-name">Dashboard Admin</span>
        </a>
        <div class="nav_list">
          <?php
              if ($url == base_url().'/DashboardAdmin') {
                echo '
                  <a href="'.base_url().'/DashboardAdmin" class="nav_link active">
                    <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                    <span class="nav_name">Progres Kegiatan</span>
                  </a>
                ';
              } else {
                echo '
                  <a href="'.base_url().'/DashboardAdmin" class="nav_link">
                    <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                    <span class="nav_name">Progres Kegiatan</span>
                  </a>
                ';
              }
          ?>
          <?php
              if ($url == base_url().'/DashboardAdmin/TambahAkun') {
                echo '
                <a href="'.base_url().'/DashboardAdmin/TambahAkun" class="nav_link active">
                <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Akun Baru</span>
                  </a>
                  ';
              } else {
                echo '
                  <a href="'.base_url().'/DashboardAdmin/TambahAkun" class="nav_link">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Akun Baru</span>
                  </a>
                ';
              }
          ?>
          <?php
              if ($url == base_url().'/DashboardAdmin/ListAkun') {
                echo '
                  <a href="'.base_url().'/DashboardAdmin/ListAkun" class="nav_link active">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">List Akun</span>
                  </a>
                ';
              } else {
                echo '
                  <a href="'.base_url().'/DashboardAdmin/ListAkun" class="nav_link">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">List Akun</span>
                  </a>
                ';
              }
            ?>
            <?php
                if ($url == base_url().'/DashboardAdmin/ListProposal') {
                  echo '
                    <a href="'.base_url().'/DashboardAdmin/ListProposal" class="nav_link active">
                      <i class="bx bx-message-square-detail nav_icon"></i>
                      <span class="nav_name">List Proposal</span>
                    </a>
                  ';
                } else {
                  echo '
                    <a href="'.base_url().'/DashboardAdmin/ListProposal" class="nav_link">
                      <i class="bx bx-message-square-detail nav_icon"></i>
                      <span class="nav_name">List Proposal</span>
                    </a>
                  ';
                }
            ?>
        </div>
      </div>
      <a href="<?php echo base_url();?>" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">Halaman Utama</span>
      </a>
    </nav>
  </div>
  <!--Container Main start-->
  <!-- <div class="height-100 bg-light">
    <h4>Main Components</h4>
  </div> -->
  <!--Container Main end-->