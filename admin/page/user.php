<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (!empty($_SESSION['ADMIN'])) {
} else {
    echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
}


// ambil nilai id dari url dan disimpan dalam variabel $id
$id_login = 1;

// menampilkan data dari database yang mempunyai id=$id
$query = "SELECT * FROM user WHERE id_login='$id_login'";
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
    echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=user';</script>";
}


?>

<div class=" mt-2">
    <?php if (isset($_GET['pesan'])) { ?>
        <?php if ($_GET['pesan'] == "berhasil") { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Successfully Changed User Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagal") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Change User Data
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
                Successfully Deleting User Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "successpass") { ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Successfully Change Password User Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Failed to Delete User Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "failedpass") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Current Password is incorrect / Password data not found
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "failedconfpass") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Invalid new password and confirmation password
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['pesan'] == "tambah") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Successfully Added User Data
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
    <?php } ?>
</div>

<h1 class="mt-4">User</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>

<div class="row">
    <div class="col-xl-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img src="../assets/img/user/<?php echo $data['profile_image']; ?>" width="150" alt="Profile" class="rounded-circle img-fluid m-3">
                <h2>Iqbal Prasetya</h2>
                <h6>Web Developer</h6>
                <div class="social-links mt-2">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-8">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                    </li>

                </ul>
                <div class="tab-content pt-2 ">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">About</h5>
                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                        <h5 class="card-title">Profile Details</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            <div class="col-lg-9 col-md-8 fw-lighter"><?php echo $data['fullname']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Address</div>
                            <div class="col-lg-9 col-md-8 fw-lighter"><?php echo $data['address']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Phone</div>
                            <div class="col-lg-9 col-md-8 fw-lighter"><?php echo $data['phone']; ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8 fw-lighter"><?php echo $data['email']; ?></div>
                        </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        <!-- Profile Edit Form -->
                        <form method="POST" action="../proses.php?aksi=edit-profile" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                <div class="col-md-8 col-lg-9">
                                    <img src="../assets/img/user/<?php echo $data['profile_image']; ?>" class="img-fluid mb-2" width="100" alt="Profile">
                                    <input class="form-control" type="file" id="formFile" name="profile_image" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="user_username" type="text" class="form-control" id="username" value="<?php echo $data['user_username']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="id_login" value="<?php echo $data['id_login']; ?>" hidden />
                                    <input name="fullname" type="text" class="form-control" id="fullName" value="<?php echo $data['fullname']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="email" type="email" class="form-control" id="Email" value="<?php echo $data['email']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Telepon" class="col-md-4 col-lg-3 col-form-label">No Telepon</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="phone" type="text" class="form-control" id="telepon" value="<?php echo $data['phone']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="address" type="text" class="form-control" id="Address" value="<?php echo $data['address']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="user_twitter" type="text" class="form-control" id="Twitter" placeholder="https://twitter.com/#" value="<?php echo $data['user_twitter']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="user_fb" type="text" class="form-control" id="Facebook" placeholder="https://facebook.com/#" value="<?php echo $data['user_fb']; ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="user_ig" type="text" class="form-control" id="Instagram" placeholder="https://instagram.com/#" value="<?php echo $data['user_ig']; ?>">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form><!-- End Profile Edit Form -->

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form method="POST" action="../proses.php?aksi=change-pass" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="user_username" class="col-md-4 col-lg-3 col-form-label">Current Username</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="user_username" type="text" class="form-control" id="user_username">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="password_lama" type="password" class="form-control" id="currentPassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="password_baru" type="password" class="form-control" id="newPassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="konf_password" type="password" class="form-control" id="renewPassword">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>