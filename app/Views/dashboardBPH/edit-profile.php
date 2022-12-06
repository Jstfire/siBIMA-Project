<?php
$session = session();
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - Edit Profil</title>
<?php
if (isset($_SESSION["username"])) {
    include(APPPATH . 'Views/temp/header.php');
}
include(APPPATH . 'Views/temp/nav.php');
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --color1: #182932;
        --color2: #14303E;
        --color3: #1F4761;
        --color4: #3488AC;
        --color5: #75ABBC;
        --color6: #FDA400;
        --color7: #FDC516;
        --color8: #E9B249;
        --color9: #E19E5A;
        --color10: #E2CEA6;
        --color11: #072026;
        --color12: #004E5F;
    }

    * {
        font-family: 'Montserrat', sans-serif;
    }

    #kontak::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    #unggah,
    #preview {
        background-color: #1F4761;
    }

    #kirim {
        background-color: #182932;
    }

    #kirim:hover {
        background-color: #3488AC;
    }

    #unggah:hover,
    #preview:hover {
        background-color: #3488AC;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
echo session()->getFlashdata('pesan');
?>
<div class="container-fluid w-75">
    <div class="row">
        <p class="fs-1 fw-bold text-center mb-1 mt-5">Profil Organisasi</p>
        <hr class="hr m-auto" style="width:430px">
        <div class="row mt-5">
            <div class="col">
                <form action="<?= base_url(); ?>/DashboardBPH/edit_profile" method="post">
                    <div class="form-outline mt-4">
                        <label class="fw-bold">Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $organisasi['nama']; ?>">
                    </div>
                    <div class="form-outline mt-4">
                        <label class="fw-bold">Kontak Organisasi</label>
                        <input type="text" name="kontak_organisasi" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $organisasi['kontak']; ?>">
                    </div>
                    <div class="form-outline mt-4">
                        <label class="fw-bold">Deskripsi Organisasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc_organisasi"><?= $organisasi['desc']; ?></textarea>
                    </div>
                    <div class="row text-center">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg rounded-5 border-0 py-2 px-4 mt-4">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include(APPPATH . 'Views/temp/footer.php');
?>