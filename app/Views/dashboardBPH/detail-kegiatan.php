<?php
$session = session();
include(APPPATH . 'Views/temp/head.php');
?>
<title>siBIMA - Detail Kegiatan</title>
<?php
if (isset($_SESSION["username"])) {
    include(APPPATH . 'Views/temp/header.php');
}
include(APPPATH . 'Views/temp/nav.php');
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    function PreviewImage() {
        pdffile = document.getElementById("uploadPDF").files[0];
        pdffile_url = URL.createObjectURL(pdffile);
        $('#viewer').attr('src', pdffile_url);
    }
</script>

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

<div class="container-fluid">
    <div class="row">
        <p class="fs-1 fw-bold text-center mb-1 mt-5">Detail Kegiatan</p>
        <hr class="hr m-auto" style="width:430px">
        <div class="row mt-5">
            <div class="col">
                <div class="form-outline mt-4">
                    <label class="fw-bold">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['nama_kegiatan']; ?>" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['tanggal_kegiatan']; ?>" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Jam Mulai Kegiatan</label>
                    <input type="time" name="jam_mulai" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['jam_mulai']; ?>" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Jam Selesai Kegiatan</label>
                    <input type="time" name="jam_akhir" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['jam_akhir']; ?>" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Lokasi Kegiatan</label>
                    <input type="text" name="lokasi_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['tempat_kegiatan']; ?>" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Organisasi/UKM penyelenggara</label>
                    <br>
                    <input type="text" name="penyelenggara" id="" value="<?php echo session()->get('nama_tampil') ?>" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" readonly>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Contact Person</label>
                    <a href="https://wa.me/<?= $kegiatan['kontak_penanggung_jawab_kegiatan']; ?>"><input type="text" name="kontak_penanggung_jawab_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['kontak_penanggung_jawab_kegiatan']; ?>" readonly></a>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Penanggung Jawab Kegiatan</label>
                    <input type="text" name="penanggung_jawab_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required value="<?= $kegiatan['penanggung_jawab_kegiatan']; ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include(APPPATH . 'Views/temp/footer.php');
?>