<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Successfully Changed Testimonial Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Change Testimonial Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        File Extension Must Be PNG And JPG
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "size") { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        File Size Can't Be More Than 2 MB
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "hapus") { ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Successfully Deleting Testimonial Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Delete Testimonial Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully Added Testimonial Data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
  <?php } ?>
</div>

<h1 class="mt-4">Section Testimonial</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="mb-4">
    <a href="index.php?page=add-testi" class="btn btn-success">Add</a>
</div>

<div class="row">
    <?php
    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
    $query = "SELECT * FROM testi ORDER BY id ASC";
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
                    Testimonial <?php echo $no ?>
                    <div class="aksi">
                        <a href="index.php?page=edit-testi&id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                        <a href="../proses.php?aksi=delete-testi&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                    </div>
                </div>
                <div class="card-body text-center">
                    <img class="rounded-circle mb-3" src="../assets/img/testi/<?php echo $row['testi_image']; ?>" alt="" width="130" height="130">
                    <h5 class="card-title"><?php echo $row['testi_name']; ?></h5>
                    <p class="card-title"><?php echo $row['testi_profession']; ?></p>
                    <p class="card-text"><?php echo $row['testi_text']; ?></p>
                </div>
            </div>
        </div>

    <?php
        $no++;
    }
    ?>
</div>