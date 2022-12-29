<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <a href="admin.php?page=blog" class="text-decoration-none text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Blog</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include 'koneksi.php';

                                $data_barang = mysqli_query($koneksi2, "SELECT * FROM blog");
                                $jumlah_barang = mysqli_num_rows($data_barang);

                                echo $jumlah_barang;

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <a href="admin.php?page=testi" class="text-decoration-none text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Testimonial</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include 'koneksi.php';

                                $data_barang = mysqli_query($koneksi2, "SELECT * FROM testi");
                                $jumlah_barang = mysqli_num_rows($data_barang);

                                echo $jumlah_barang;

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <a href="admin.php?page=message" class="text-decoration-none text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Message</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include 'koneksi.php';

                                $data_barang = mysqli_query($koneksi2, "SELECT * FROM messages");
                                $jumlah_barang = mysqli_num_rows($data_barang);

                                echo $jumlah_barang;

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-message fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <a href="admin.php?page=partner" class="text-decoration-none text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Patner</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                include 'koneksi.php';

                                $data_barang = mysqli_query($koneksi2, "SELECT * FROM partners");
                                $jumlah_barang = mysqli_num_rows($data_barang);

                                echo $jumlah_barang;

                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


</div>


<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Latest Message
            </div>
            <div class="card-body overflow-auto" style="height: 350px; background-color: #051219;">
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
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i>
                Latest Testimonial
            </div>
            <div class="card-body overflow-auto" style="height: 350px; background-color: #051219;">
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM testi ORDER BY id DESC";
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

                        <img class="rounded-circle mb-3" src="assets/img/testi/<?php echo $row['testi_image']; ?>" alt="" width="130" height="130">
                        <p class="alert-heading"><?php echo $row['testi_name']; ?> - <?php echo $row['testi_profession']; ?></p>
                        <hr>
                        <p><?php echo $row['testi_text']; ?></p>
                    </div>

                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </div>
</div>