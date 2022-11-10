<?php
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - Pengajuan Proposal</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    
    <h1>Pengajuan Proposal</h1>
<?php
    include('temp/footer.php');
?>