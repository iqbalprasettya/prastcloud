<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require 'koneksi.php';
if (!empty($_SESSION['ADMIN'])) {
} else {
    echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
}


?>



<div class="container">

    <div class=" mt-2">
        <?php if (isset($_GET['pesan'])) { ?>
            <?php if ($_GET['pesan'] == "berhasil") { ?>
                <div class="alert alert-primary" role="alert">
                    Berhasil Menambahkan Data Siswa
                </div>
            <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                <div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data Siswa
                </div>
            <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
                <div class="alert alert-warning" role="alert">
                    Ekstensi File Harus PNG Dan JPG
                </div>
            <?php } elseif ($_GET['pesan'] == "size") { ?>
                <div class="alert alert-warning" role="alert">
                    Size File Tidak Boleh Lebih Dari 2 MB
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Tambah Gambar Jumbotron
        </div>
        <div class="card-body">
            <form method="POST" action="proses.php?aksi=add-about" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group mb-3">
                            <label class="mb-2">Gambar Jumbotron</label>
                            <br>
                            <input class="form-control" type="file" id="formFile" name="about_image" required="" />
                        </div>
                        <div class="form-group mb-3">
                            <label>Nomor Kontak</label>
                            <input class="form-control" type="text" name="about_text" autofocus="" required="" />
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group mb-3">
                            <label>Nomor Kontak</label>
                            <input class="form-control" type="text" name="about_text" autofocus="" required="" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-block btn-success">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>