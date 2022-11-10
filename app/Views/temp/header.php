<header class="d-flex justify-content-end bg-dark text-white">
    <h6 class="my-1 mx-2">
        <?php
            $session = session();
            
            /* This sets the $time variable to the current hour in the 24 hour clock format */
            $time = date("H");
            /* Set the $timezone variable to become the current timezone */
            $timezone = date("e");
            /* If the time is less than 1200 hours, show good morning */
            if ($time < "12") {
                echo "Selamat Pagi, ";
            } else
            /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
            if ($time >= "12" && $time < "16") {
                echo "Selamat Siang, ";
            } else
            /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
            if ($time >= "16" && $time < "18") {
                echo "Selamat Sore, ";
            } else
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            if ($time >= "18") {
                echo "Selamat Malam, ";
            }
            echo $session->get('nama_tampil')."! | ".$session->get('role');
        ?>
    </h6>
</header>