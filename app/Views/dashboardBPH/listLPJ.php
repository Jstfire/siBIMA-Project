<?php
    include (APPPATH.'Views/temp/head.php');
?>
    <title>siBIMA - List LPJ</title>
    <link href="<?php echo base_url();?>/assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script>
        function PreviewImage(upload, view) {
            pdffile = document.getElementById(upload).files[0];
            pdffile_url = URL.createObjectURL(pdffile);
            $('#'.concat(view)).attr('src', pdffile_url);
        }
    </script>
</head>
<body>
    <?php
        include('sidebar.php');
    ?>
    <div class="container-fluid mt-5 pt-3 mx-0 px-0">
        <h1 class="m-0">List LPJ</h1>
        <hr class="m-0 mb-3">
        <table id="tableLPJ" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Organisasi</th>
                    <th scope="col">LPJ</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php if (isset($lpj)) :?>
                <?php foreach ($lpj as $elpeje) :?>
                    <tr>
                        <th scope="row"><?= $elpeje['id_lpj'] ?></th>
                        <td><?= $elpeje['nama_kegiatan'] ?></td>
                        <td><?= $elpeje['nama_organisasi'] ?></td>
                        <?php if (isset($elpeje['url_file'])) :?>
                        <td><a href="<?= base_url(); ?>/lpj/download/<?= $elpeje['id_lpj']; ?>"><?= $elpeje['url_file']; ?></a></td>
                        <?php else :?>
                            <td>Belum Ada</td>
                        <?php endif?>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalUploadLPJ<?= $elpeje['id_lpj']; ?>">
                                Upload
                            </button>
                            <a href="<?=base_url()?>/kegiatan/detail/<?= $elpeje['id_kegiatan'] ?>" class="btn btn-primary">
                                Detail <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal Upload LPJ -->
                    <div class="modal fade" id="modalUploadLPJ<?= $elpeje['id_lpj']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUploadLPJLabel<?= $elpeje['id_lpj']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalUploadLPJLabel<?= $elpeje['id_lpj']; ?>">Upload LPJ <?= $elpeje['nama_kegiatan'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="container-fluid text-center">
                                    <form class="mt-3 mx-3" action="<?php base_url() ?>/lpj/upload/<?= $elpeje['id_lpj']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="input-group-sm mb-1">
                                            <p>*Unggah dalam format .pdf</p>
                                            <input id="uploadPDF<?= $elpeje['id_lpj']; ?>" type="file" accept="application/pdf" name="myPDF" value="" />
                                            <br />
                                            <div class="text-center">
                                                <input id="preview" type="button" class="btn btn-primary rounded-2 border-0 py-2 px-3 mt-3" value="Preview" onclick="PreviewImage('uploadPDF<?= $elpeje['id_lpj']; ?>','viewer<?= $elpeje['id_lpj']; ?>');" />
                                            </div>
                                        </div>
                                        <p>Scroll ke bawah untuk submit!</p>
                                        <div style="clear:both" class="text-center">
                                            <iframe id="viewer<?= $elpeje['id_lpj']; ?>" frameborder="0" scrolling="no" width="400" height="600"></iframe>
                                        </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit">Simpan Perubahan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                <?php endif?>
            </tbody>
        </table>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $('#tableLPJ').DataTable();
        });
    </script>
<?php
    include(APPPATH.'Views/temp/footer.php');
?>