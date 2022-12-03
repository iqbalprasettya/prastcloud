<div class=" mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-primary" role="alert">
                Successfully Changed About Data
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger" role="alert">
                Failed to Change About Data
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
                Successfully Deleting About Data
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger" role="alert">
                Failed to Delete About Data
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-danger" role="alert">
                Successfully Added About Data
            </div>
        <?php } ?>
    <?php } ?>
</div>

<h1 class="mt-4">Section About</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row justify-content-center">
    <?php
    // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
    $query  = "SELECT * FROM about ORDER BY id ASC";
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
                    About <?php echo $row['id']; ?>
                    <a href="admin.php?page=edit-about&id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                </div>
                <div class="card-body text-center">
                    <label class="mb-2" style="color: #00bfa6;">About Image</label>
                    <img src="assets/img/about/<?php echo $row['about_image']; ?>" class="card-img-top mb-3" width="250" height="250">
                    <label class="mb-2" style="color: #00bfa6;">About Text</label>
                    <p class="card-text"><?php echo $row['about_text']; ?></p>
                </div>
            </div>
        </div>

    <?php
        $no++;
    }
    ?>
</div>