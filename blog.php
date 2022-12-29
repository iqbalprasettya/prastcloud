<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrastCloud | Blog</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- css -->
    <style>
        <?php include "assets/css/style.css";
        ?>
    </style>
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Font Awesome & Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Owl Corousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar" style="padding: 1.5rem 1.5rem">
        <div class="container">
            <a class="navbar-brand" id="navbar-brand" href="index.php">PrastCloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div id="navbar-nav" class="navbar-nav ms-auto">
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="index.php#home">Home</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="index.php#about">About</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="blog.php?page=blog">Blog</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="page/pricing.php">Pricing</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="index.php#contact">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->



    <?php include "page/config.php"; ?>


    <!-- Footer -->
    <section id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5 content-card mb-3">
                    <h4 class="mb-3">PrastCloud</h4>
                    <?php

                    $query = "SELECT * FROM about ORDER BY id ASC";
                    $result = mysqli_query($koneksi2, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_errno($koneksi2) .
                            " - " . mysqli_error($koneksi2));
                    }
                    $row = mysqli_fetch_assoc($result)
                    ?>
                    <p><?php echo $row['about_text']; ?></p>

                    <?php ?>

                    <div class="social-links d-flex mt-4">
                        <?php

                        $query = "SELECT * FROM user ORDER BY id_login = 1";
                        $result = mysqli_query($koneksi2, $query);

                        if (!$result) {
                            die("Query Error: " . mysqli_errno($koneksi2) .
                                " - " . mysqli_error($koneksi2));
                        }
                        $row = mysqli_fetch_assoc($result)
                        ?>
                        <a href="<?php echo $row['user_twitter']; ?>" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
                        <a href="<?php echo $row['user_fb']; ?>" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="<?php echo $row['user_ig']; ?>" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>

                        <?php ?>

                    </div>
                </div>
                <div class="col-md-5 content-card mb-3">
                    <div class="row">
                        <div class="col-md-6 sub-card">
                            <h4 class="mb-3">Useful Link</h4>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="blog.php?page=blog">Blog</a></li>
                            <li><a href="page/pricing.php">Pricing</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </div>
                        <div class="col-md-6 sub-card">
                            <h4 class="mb-3">Maps</h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5331624923656!2d106.7650867143138!3d-6.5804422661564015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4f906e40827%3A0x6b93a4462670547c!2sSMK%20Infokom%20Kota%20Bogor!5e0!3m2!1sid!2sid!4v1663212897161!5m2!1sid!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end Footer -->

    <section id="copyright" class="copyright">
        <div class="container text-center content-card">
            <p>
                ©Copyright 2022 <span>PrastCloud</span>. All Rights Reserved
            </p>
            <?php

            $query = "SELECT * FROM user ORDER BY id_login = 1";
            $result = mysqli_query($koneksi2, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi2) .
                    " - " . mysqli_error($koneksi2));
            }
            $row = mysqli_fetch_assoc($result)
            ?>
            <p>
                Designed by <a href="<?php echo $row['user_ig']; ?>" target="_blank">Iqbal Prasetya</a>
            </p>

            <?php ?>

        </div>
    </section>




    <script src="assets/js/script.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 10,
            nav: false,
            items: 1,
        })
    </script>
</body>

</html>