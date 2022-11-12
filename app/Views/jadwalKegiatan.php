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
    $monday     = date('Y-m-d', strtotime('last monday', strtotime('tomorrow')));
    $tuesday    = date('Y-m-d', strtotime('+1 days', $baseday));
    $wednesday  = date('Y-m-d', strtotime('+2 days', $baseday));
    $thursday   = date('Y-m-d', strtotime('+3 days', $baseday));
    $friday     = date('Y-m-d', strtotime('+4 days', $baseday));
    $saturday   = date('Y-m-d', strtotime('+5 days', $baseday));
    $sunday     = date('Y-m-d', strtotime('+6 days', $baseday));
    echo '<p>' . $monday . '</p>';
    echo '<p>' . $tuesday . '</p>';
    echo '<p>' . $wednesday. '</p>';
    echo '<p>' . $thursday  . '</p>';
    echo '<p>' . $friday. '</p>';
    echo '<p>' . $saturday   . '</p>';
    echo '<p>' . $sunday . '</p>';

    $date=date_create("2013-03-15");
    echo date_format($date,"D, d F Y H:i:s");

    // echo "<P>". date('d-M-Y', $monday) . " to " . date('d-M-Y', $sunday) . "</P>";
?>
    
    <h1>Jadwal Kegiatan</h1>
<?php
    include('temp/footer.php');
?>