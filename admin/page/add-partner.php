<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (!empty($_SESSION['ADMIN'])) {
} else {
    echo '<script>alert("Maaf Login Dahulu !");window.location="../login/"</script>';
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
            Tambah Gambar Partner
        </div>
        <div class="card-body">
            <form method="POST" action="../proses.php?aksi=add-partner" enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="form-group mb-3">
                            <label class="mb-2">Partner Image</label>
                            <br>
                            <input class="form-control" type="file" id="formFile" name="partner_image" required="" />
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