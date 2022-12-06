<?php
    use CodeIgniter\I18n\Time;
    $baseday    = strtotime('last monday', strtotime('tomorrow'));
    $viewMonday     = date('D, d F Y', strtotime('last monday', strtotime('tomorrow')));
    $viewTuesday    = date('D, d F Y', strtotime('+1 days', $baseday));
    $viewWednesday  = date('D, d F Y', strtotime('+2 days', $baseday));
    $viewThursday   = date('D, d F Y', strtotime('+3 days', $baseday));
    $viewFriday     = date('D, d F Y', strtotime('+4 days', $baseday));
    $viewSaturday   = date('D, d F Y', strtotime('+5 days', $baseday));
    $viewSunday     = date('D, d F Y', strtotime('+6 days', $baseday));
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - Jadwal Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    <div class="container my-5">
        <div class="container-fluid text-center">
            <h1 class="display-5 fw-bold">Jadwal Kegiatan</h1>
            <hr class="mt-0">
        </div>
        <!-- monday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewMonday ?></h5>
            <hr class="mt-0">
            <table class="table" id="monday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($monday as $mon) : ?>
                        <tr>
                            <td scope="row"><?= $mon['nama_kegiatan'] ?></td>
                            <td><?= $mon['nama_organisasi'] ?></td>
                            <td><?= $mon['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($mon['jam_mulai']))." - ".date("H.i", strtotime($mon['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($mon['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $mon['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $mon['jam_mulai'] && $timeNow < $mon['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $mon['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $mon['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $mon['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- tuesday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewTuesday ?></h5>
            <hr class="mt-0">
            <table class="table" id="tuesday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tuesday as $tues) : ?>
                        <tr>
                            <td scope="row"><?= $tues['nama_kegiatan'] ?></td>
                            <td><?= $tues['nama_organisasi'] ?></td>
                            <td><?= $tues['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($tues['jam_mulai']))." - ".date("H.i", strtotime($tues['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($tues['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $tues['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $tues['jam_mulai'] && $timeNow < $tues['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $tues['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $tues['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $tues['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- wednesday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewWednesday ?></h5>
            <hr class="mt-0">
            <table class="table" id="wednesday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($wednesday as $wed) : ?>
                        <tr>
                            <td scope="row"><?= $wed['nama_kegiatan'] ?></td>
                            <td><?= $wed['nama_organisasi'] ?></td>
                            <td><?= $wed['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($wed['jam_mulai']))." - ".date("H.i", strtotime($wed['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($wed['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $wed['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $wed['jam_mulai'] && $timeNow < $wed['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $wed['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $wed['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $wed['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- thursday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewThursday ?></h5>
            <hr class="mt-0">
            <table class="table" id="thursday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($thursday as $thurs) : ?>
                        <tr>
                            <td scope="row"><?= $thurs['nama_kegiatan'] ?></td>
                            <td><?= $thurs['nama_organisasi'] ?></td>
                            <td><?= $thurs['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($thurs['jam_mulai']))." - ".date("H.i", strtotime($thurs['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($thurs['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $thurs['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $thurs['jam_mulai'] && $timeNow < $thurs['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $thurs['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $thurs['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $thurs['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- friday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewFriday ?></h5>
            <hr class="mt-0">
            <table class="table" id="friday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($friday as $fri) : ?>
                        <tr>
                            <td scope="row"><?= $fri['nama_kegiatan'] ?></td>
                            <td><?= $fri['nama_organisasi'] ?></td>
                            <td><?= $fri['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($fri['jam_mulai']))." - ".date("H.i", strtotime($fri['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($fri['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $fri['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $fri['jam_mulai'] && $timeNow < $fri['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $fri['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $fri['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $fri['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- saturday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewSaturday ?></h5>
            <hr class="mt-0">
            <table class="table" id="saturday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($saturday as $sat) : ?>
                        <tr>
                            <td scope="row"><?= $sat['nama_kegiatan'] ?></td>
                            <td><?= $sat['nama_organisasi'] ?></td>
                            <td><?= $sat['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($sat['jam_mulai']))." - ".date("H.i", strtotime($sat['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($sat['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $sat['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $sat['jam_mulai'] && $timeNow < $sat['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $sat['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $sat['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $sat['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- sunday -->
        <div class="container-fluid my-4 bg-primary p-4 bg-opacity-10 rounded-3">
            <h5><?= $viewSunday ?></h5>
            <hr class="mt-0">
            <table class="table" id="sunday">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Organisasi</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($sunday as $sun) : ?>
                        <tr>
                            <td scope="row"><?= $sun['nama_kegiatan'] ?></td>
                            <td><?= $sun['nama_organisasi'] ?></td>
                            <td><?= $sun['tempat_kegiatan'] ?></td>
                            <td><?= date("H.i", strtotime($sun['jam_mulai']))." - ".date("H.i", strtotime($sun['jam_akhir'])) ?></td>
                            <td>
                            <?php
                                    $now = Time::today('Asia/Jakarta', 'en_US')->toDateString();
                                    $timeNow =date("H:i:s");
                                    // dd($sun['jam_mulai']);
                                    
                                    $tanggal_kegiatan = $sun['tanggal_kegiatan'];
                                    // dd($tanggal_kegiatan);
                                    if($tanggal_kegiatan > $now){
                                        echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                    } else if(strcmp($tanggal_kegiatan, $now) == 0){
                                        if ($timeNow > $sun['jam_mulai'] && $timeNow < $sun['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-success">Sedang Berjalan</button>';
                                        } else if ($timeNow < $sun['jam_mulai']) {
                                            echo '<button type="button" class="btn btn-primary">Belum Dimulai</button>';
                                        } else if ($timeNow > $sun['jam_akhir']) {
                                            echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                        }
                                    } else{
                                        echo '<button type="button" class="btn btn-secondary" disabled>Selesai</button>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="<?php base_url() ?>/kegiatan/detail/<?= $sun['id_kegiatan'] ?>" class="btn btn-primary">Detail <i class="fa-solid fa-angle-right"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#monday').DataTable();
        });
        $(document).ready(function() {
            $('#tuesday').DataTable();
        });
        $(document).ready(function() {
            $('#wednesday').DataTable();
        });
        $(document).ready(function() {
            $('#thursday').DataTable();
        });
        $(document).ready(function() {
            $('#friday').DataTable();
        });
        $(document).ready(function() {
            $('#saturday').DataTable();
        });
        $(document).ready(function() {
            $('#sunday').DataTable();
        });
    </script>

<?php
    include('temp/footer.php');
?>