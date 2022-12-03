<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-primary" role="alert">
        Successfully Changed News Data
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger" role="alert">
        Failed to Change News Data
      </div>
    <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
      <div class="alert alert-warning" role="alert">
        File Extension Must Be PNG And JPG
      </div>
    <?php } elseif ($_GET['pesan'] == "size") { ?>
      <div class="alert alert-warning" role="alert">
        File Size Can't Be More Than 2 MB
      </div>
    <?php } elseif ($_GET['pesan'] == "hapus") { ?>
      <div class="alert alert-primary" role="alert">
        Successfully Deleting News Data
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger" role="alert">
        Failed to Delete News Data
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success" role="alert">
        Successfully Added News Data
      </div>
    <?php } ?>
  <?php } ?>
</div>

<h1 class="mt-4">Section News</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="mb-4">
  <a href="admin.php?page=add-news" class="btn btn-success">Add</a>
</div>

<div class="row">
  <?php
  // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
  $query = "SELECT * FROM news ORDER BY id ASC";
  $result = mysqli_query($koneksi2, $query);
  //mengecek apakah ada error ketika menjalankan query
  if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi2) .
      " - " . mysqli_error($koneksi2));
  }
  $no = 1;
  while ($row = mysqli_fetch_assoc($result)) {
  ?>

    <div class="col-xl-4">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
          News <?php echo $no ?>
          <div class="aksi">
            <a href="admin.php?page=edit-news&id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
            <a href="proses.php?aksi=delete-news&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
        <div class="card-body text-center">
          <img src="assets/img/news/<?php echo $row['news_image']; ?>" class="card-img-top" width="250" height="250">
          <h5 class="card-title"><?php echo $row['news_heading']; ?></h5>
          <p class="card-text"><?php echo $row['news_text']; ?></p>
        </div>
      </div>
    </div>

  <?php
    $no++;
  }
  ?>
</div>