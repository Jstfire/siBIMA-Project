<?php
    $session = session();
    include('temp/head.php');
?>
    <title>siBIMA - List Organisasi</title>
<?php
    if (isset($_SESSION["username"])) {
        include('temp/header.php');
    }
    include('temp/nav.php');
?>
    
    <h1>List Organisasi</h1>
<?php
    include('temp/footer.php');
?>