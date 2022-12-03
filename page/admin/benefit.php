<div class=" mt-2">
<?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-primary" role="alert">
        Successfully Changed Benefit Data
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger" role="alert">
        Failed to Change Benefit Data
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
        Successfully Deleting Benefit Data
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger" role="alert">
        Failed to Delete Benefit Data
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-danger" role="alert">
        Successfully Added Benefit Data
      </div>
    <?php } ?>
  <?php } ?>
</div>

<h1 class="mt-4">Section Benefit</h1>
<ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
  <?php
  // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
  $query = "SELECT * FROM benefit ORDER BY id ASC";
  $result = mysqli_query($koneksi2, $query);
  //mengecek apakah ada error ketika menjalankan query
  if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi2) .
      " - " . mysqli_error($koneksi2));
  }
  $no = 1;
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="col-xl-6">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
          Benefit <?php echo $row['id']; ?>
          <a href="admin.php?page=edit-benefit&id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
        </div>
        <div class="card-body text-center">
          <img src="assets/img/benefit/<?php echo $row['benefit_image']; ?>" class="card-img-top" width="250" height="250">
          <h5 class="card-title"><?php echo $row['benefit_heading']; ?></h5>
          <p class="card-text"><?php echo $row['benefit_text']; ?></p>
        </div>
      </div>
    </div>

  <?php
    $no++;
  }
  ?>
</div>