<?php
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - Jadwal Kegiatan</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');

    $baseday    = strtotime('last monday', strtotime('tomorrow'));
    $monday     = date('d-M-Y', strtotime('last monday', strtotime('tomorrow')));
    $tuesday    = date('d-M-Y', strtotime('+1 days', $baseday));
    $wednesday  = date('d-M-Y', strtotime('+2 days', $baseday));
    $thursday   = date('d-M-Y', strtotime('+3 days', $baseday));
    $friday     = date('d-M-Y', strtotime('+4 days', $baseday));
    $saturday   = date('d-M-Y', strtotime('+5 days', $baseday));
    $sunday     = date('d-M-Y', strtotime('+6 days', $baseday));
    echo '<p>' . $monday . '</p>';
    echo '<p>' . $tuesday . '</p>';
    echo '<p>' . $wednesday. '</p>';
    echo '<p>' . $thursday  . '</p>';
    echo '<p>' . $friday. '</p>';
    echo '<p>' . $saturday   . '</p>';
    echo '<p>' . $sunday . '</p>';

    // echo "<P>". date('d-M-Y', $monday) . " to " . date('d-M-Y', $sunday) . "</P>";
?>
    
    <h1>Jadwal Kegiatan</h1>
<?php
    include('temp/footer.php');
?>