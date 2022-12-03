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

if (isset($_GET['id'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id = ($_GET["id"]);

  // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT * FROM news WHERE id='$id'";
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
    echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=news';</script>";
  }
} else {
  // apabila tidak ada data GET id pada akan di redirect ke index.php
  echo "<script>alert('Masukkan data id.');window.location='admin.php?page=news';</script>";
}

?>



<div class="container">


  <div class="card mt-3">
    <div class="card-header">
      Edit Section news

    </div>
    <div class="card-body">
      <form method="POST" action="proses.php?aksi=edit-news" enctype="multipart/form-data">
        <div class="row justify-content-center">
          <p class="text-danger fst-italic" style="font-size: 12px;">forbidden to use ( ' )</p>
          <br>
          <div class="col-xl-6 text-center">
            <div class="card mb-4">
              <div class="form-group mb-2">
                <input name="id" value="<?php echo $data['id']; ?>" hidden />
                <label class="m-2">News Image</label>
                <br>
                <img class="mb-2" src="assets/img/news/<?php echo $data['news_image']; ?>" width="250" height="250">
                <input class="form-control" type="file" id="formFile" name="news_image" />
              </div>
            </div>
          </div>
          <div class="col-xl-6 text-center">
            <div class="card mb-4">
              <div class="form-group mb-2">
                <label class="m-2">News Heading</label>
                <textarea class="form-control" id="editor2" name="news_heading" rows="5"><?php echo $data['news_heading']; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-xl-6 text-center">
            <div class="card mb-4">
              <div class="form-group mb-2">
                <label class="m-2">News Text</label>
                <textarea class="form-control" id="editor2" name="news_text" rows="5"><?php echo $data['news_text']; ?></textarea>
              </div>
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