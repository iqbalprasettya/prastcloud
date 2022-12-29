<div class=" mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Successfully Changed Message Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Change Message Data
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
                Successfully Deleting Message Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Delete Message Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Added Message Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<h1 class="mt-4">Message</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Latest Message
            </div>
            <div class="card-body overflow-auto" style="height: 600px; background-color: #051219;">
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM messages ORDER BY id DESC";
                $result = mysqli_query($koneksi2, $query);
                //mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi2) .
                        " - " . mysqli_error($koneksi2));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="alert-bal border-left-primary alert" role="alert">

                        <p><?php echo $row['messages_date']; ?></p>
                        <p class="alert-heading"><?php echo $row['messages_nama']; ?> - <?php echo $row['messages_email']; ?></p>
                        <hr>
                        <p><?php echo $row['messages_subjek']; ?></p>
                        <p class="fw-lighter" style="opacity: 0.7;"><?php echo $row['messages_text']; ?></p>
                        <div class="text-end">
                            <a href="proses.php?aksi=delete-messages&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Delete</a>
                        </div>
                    </div>

                <?php
                    $no++;
                }
                ?>

            </div>
        </div>
    </div>
</div>