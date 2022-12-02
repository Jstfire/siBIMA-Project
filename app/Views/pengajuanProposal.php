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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    function PreviewImage() {
        pdffile=document.getElementById("uploadPDF").files[0];
        pdffile_url=URL.createObjectURL(pdffile);
        $('#viewer').attr('src',pdffile_url);
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

    #unggah, #preview {
        background-color: #1F4761;
    }

    #kirim {
        background-color: #182932;
    }

    #kirim:hover {
        background-color: #3488AC;
    }

    #unggah:hover, #preview:hover {
        background-color: #3488AC;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <p class="fs-1 fw-bold text-center mb-1 mt-5">Pengajuan Proposal</p>
        <hr class="hr m-auto" style="width:430px">
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <div style="clear:both">
                    <iframe id="viewer" frameborder="0" scrolling="no" width="400" height="600"></iframe>
                </div>
            </div>
            <div class="col">
                <div class="form-outline mt-4">
                    <label class="fw-bold">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow">
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow">
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Lokasi Kegiatan</label>
                    <input type="text" name="lokasi_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow">
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Organisasi/UKM penyelenggara</label>
                    <br>
                    <select name="penyelenggara" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow" required>
                        <option selected="selected" disabled="disabled">Pilih organisasi/UKM penyelenggara</option>
                        <option>Dewan Perwakilan Mahasiswa</option>
                        <option>Senat Mahasiswa</option>
                        <option>Satuan Penegak Disiplin</option>
                        <option>Resimen Mahasiswa</option>
                        <option>Rohani Islam</option>
                        <option>Rohani Kristen</option>
                        <option>Rohani Hindu</option>
                        <option>Excelsior</option>
                        <option>Teater Antik</option>
                        <option>Paradise</option>
                        <option>X-Bar</option>
                        <option>Kewirausahaan</option>
                        <option>Media Kampus</option>
                        <option>KSR</option>
                        <option>GPA Cheby</option>
                        <option>Futsal</option>
                        <option>Bulu Tangkis</option>
                        <option>Tenis Meja</option>
                        <option>Tenis Lapangan</option>
                        <option>Voli</option>
                        <option>Basket</option>
                        <option>Taekwondo</option>
                        <option>Senam</option>
                        <option>Silat</option>
                        <option>Billiard</option>
                        <option>Catur</option>
                        <option>Bridge</option>
                        <option>E-Sport</option>
                        <option>Forkas</option>
                        <option>Komnet</option>
                        <option>Bimbel</option>
                        <option>SES</option>
                        <option>Nihongobu</option>
                    </select>
                </div>
                <div class="form-outline mt-4">
                    <label class="fw-bold">Contact Person</label>
                    <input type="number" name="kontak_kegiatan" class="bg-secondary p-2 text-dark bg-opacity-25 form-control form-control-line shadow">
                </div>
                <div class="row d-flex flex-row mb-3" style="margin-top: 25px;">
                    <div>
                        <p>*Unggah dalam format .pdf</p>
                        <input id="uploadPDF" type="file" accept="application/pdf" name="myPDF"/>
                        <br/>
                        <input id="preview" type="button" class="btn btn-primary rounded-2 border-0 py-2 px-3 mt-3" value="Preview" onclick="PreviewImage();" />
                    </div>
                </div>
                <div class="row text-center">
                    <div>
                        <button type="button" name="kirim" class="btn btn-primary btn-lg rounded-5 border-0 py-2 px-4 mt-4">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('temp/footer.php');
?>
