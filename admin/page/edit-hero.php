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

if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM hero WHERE id='$id'";
    $result = mysqli_query($koneksi2, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php?page=hero';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php?page=hero';</script>";
}

?>



<div class="container">


    <div class="card mt-3">
        <div class="card-header">
            Edit Section Hero
        </div>
        <div class="card-body">
            <form method="POST" action="../proses.php?aksi=edit-hero" enctype="multipart/form-data">
                <div class="row">
                    <p class="text-danger fst-italic" style="font-size: 12px;">forbidden to use ( ' )</p>
                    <br>
                    <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <input name="id" value="<?php echo $data['id']; ?>" hidden />
                                <label class="mb-2">Hero image</label>
                                <br>
                                <img class="mb-2" style="width: 250px;" src="../assets/img/hero/<?php echo $data['hero_image']; ?>">
                                <input class="form-control" type="file" id="formFile" name="hero_image" />
                            </div>
                    </div>
                    <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label>Hero Text</label>
                                <br>
                                <p class="text-danger fst-italic" style="font-size: 12px;">use italic to give different color to the text</p>
                                <textarea class="form-control" id="editor2" name="hero_text" rows="5"><?php echo $data['hero_text']; ?></textarea>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-md btn-block btn-success">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>