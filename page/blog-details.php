<?php
// memanggil file koneksi.php untuk membuat koneksi
include 'koneksi.php';
// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM blog WHERE id='$id'";
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
        echo "<script>alert('Data tidak ditemukan pada database');window.location='blog.php;</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='blog.php;</script>";
}

?>

<!-- Jumbotron -->
<section class="home2" id="home">
    <div class="background-banner container">
        <div class="row justify-content-center">
            <div class="col-md-5 about-text text-center" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="500">
                <h2>Blog Details</h2>
            </div>
        </div>
    </div>
    <!-- <svg class="waves" xmlns="http:
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg> -->
</section>
<!-- End Jumbotron -->

<div class="link-blog mt-2">
    <div class="container">
        <ol>
            <li><a href="index.php">Home</a></li>
            <li>Blog Details</li>
        </ol>
    </div>
</div>
<!-- Pricing -->
<section class="blog my-2" id="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details">
                    <div class="post-img">
                        <img src="assets/img/blog/<?php echo $data['blog_image']; ?>" alt="" class="img-fluid">
                    </div>

                    <h2 class="title mt-3"><?php echo $data['blog_heading']; ?></h2>

                    <div class="meta-top">
                        <ul>
                            <?php

                            $query = "SELECT * FROM user ORDER BY id_login ASC LIMIT 1";
                            $result = mysqli_query($koneksi2, $query);

                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi2) .
                                    " - " . mysqli_error($koneksi2));
                            }
                            $row = mysqli_fetch_assoc($result)
                            ?>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html"><?php echo $row['fullname']; ?></a></li>

                            <?php ?>

                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="<?php echo date('Y-m-d', strtotime($data['blog_date'])); ?>"><?php echo date('M d Y', strtotime($data['blog_date'])); ?></time></a></li>
                        </ul>
                    </div>

                    <div class="content my-3">
                        <?php echo $data['blog_text']; ?>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">

                <div class="sidebar">

                    <div class="sidebar-item recent-posts">
                        <h3 class="sidebar-title">Recent Posts</h3>

                        <div class="mt-3">
                            <?php
                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                            $query = "SELECT * FROM blog ORDER BY id DESC";
                            $result = mysqli_query($koneksi2, $query);
                            //mengecek apakah ada error ketika menjalankan query
                            if (!$result) {
                                die("Query Error: " . mysqli_errno($koneksi2) .
                                    " - " . mysqli_error($koneksi2));
                            }
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="post-item mt-3">
                                    <img src="assets/img/blog/<?php echo $row['blog_image']; ?>" alt="">
                                    <div>
                                        <h4><a href="blog.php?page=blog-details&id=<?php echo $row['id']; ?>"><?php echo $row['blog_heading']; ?></a></h4>
                                        <p class="time"><time datetime="<?php echo date('Y-m-d', strtotime($row['blog_date'])); ?>"><?php echo date('M d Y', strtotime($row['blog_date'])); ?></time></p>
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
        </div>

    </div>
</section>
<!-- End blog -->