<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrastCloud | Pricing</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- css -->
    <style>
        <?php include "../assets/css/style.css";
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
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: "Outfit", sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: "Outfit", sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-c3ow {
            border-color: inherit;
            text-align: center;
            vertical-align: top
        }

        .tg .tg-0pky {
            border-color: inherit;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-7jts {
            border-color: inherit;
            text-align: center;
            vertical-align: top;
        }

        .tg .tg-7jts span {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar" style="padding: 1.5rem 1.5rem">
        <div class="container">
            <a class="navbar-brand" id="navbar-brand" href="#">PrastCloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div id="navbar-nav" class="navbar-nav ms-auto">
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="../index.php#home">Home</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="../index.php#about">About</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="../blog.php?page=blog">Blog</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up active" href="#pricing">Pricing</a>
                    <a id="nav-link" class="nav-link nav-link-grow-up" href="../index.php#contact">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Jumbotron -->
    <section class="home2">
        <div class="background-banner container">
            <div class="row justify-content-center">
                <div class="col-md-5 about-text text-center" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="500">
                    <h2>Pricing</h2>
                </div>
            </div>
        </div>
        <!-- <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
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

    <!-- Pricing -->
    <section class="pricing" id="pricing">
        <div class="container">
            <div class="row text-content justify-content-center">
                <div class="col-md-6 mb-3">
                    <h3>Pilih Paket yang tepat untuk Anda</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card col-md-5">
                    <div class="image"></div>
                    <div class="text-info">
                        <h4>Plus</h4>
                        <p>US$9,99 / bulan</p>
                        <p>1 TB (1.000 GB)</p>
                        <a href="" class="btn btn-danger mb-3">Beli Sekarang</a>
                        <p>
                            <i class="fa fa-check"></i> Perlindungan konten dan kontrol
                            berbagi eksternal yang mudah digunakan
                        </p>
                        <p>
                            <i class="fa fa-check"></i> Memulihkan file atau seluruh akun
                            Anda hingga 180 hari
                        </p>
                        <p>
                            <i class="fa fa-check"></i> Otomatis mencadangkan komputer—dan
                            drive eksternal yang terhubung—langsung ke awan
                        </p>
                    </div>
                </div>
                <div class="card col-md-5">
                    <div class="image"></div>
                    <div class="text-info">
                        <h4>Family</h4>
                        <p>US$16,99 / bulan</p>
                        <p>2 TB (2.000 GB)</p>
                        <a href="" class="btn btn-danger mb-3">Beli Sekarang</a>
                        <p>
                            <i class="fa fa-check"></i> Akun perorangan untuk maksimal 6
                            orang
                        </p>
                        <p>
                            <i class="fa fa-check"></i> Akses ke folder Ruang Keluarga agar
                            mudah berbagi dan berkoordinasi dengan grup
                        </p>
                        <p>
                            <i class="fa fa-check"></i> Satu tagihan untuk seluruh keluarga
                        </p>
                    </div>
                </div>
                <div class="card col-md-5">
                    <div class="image"></div>
                    <div class="text-info">
                        <h4>Professional</h4>
                        <p>US$16,58 / bulan</p>
                        <p>3 TB (3.000 GB)</p>
                        <a href="" class="btn btn-danger mb-3">Beli Sekarang</a>
                        <p><i class="fa fa-check"></i> Penautan perangkat tak terbatas</p>
                        <p><i class="fa fa-check"></i> Pemulihan file dan akun 30 hari</p>
                        <p>
                            <i class="fa fa-check"></i> Pengiriman file besar dengan Dropbox
                            Transfer (hingga 2 GB)
                        </p>
                        <p>
                            <i class="fa fa-check"></i> 3 tanda tangan elektronik gratis per
                            bulan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing -->
    <section id="table-pricing" class="table-pricing">
        <div class="container">
            <div class="row justify-content-center" style="overflow: auto">
                <table class="tg" style="table-layout: fixed; width: 760px">
                    <colgroup>
                        <col style="width: 300.75px">
                        <col style="width: 200.75px">
                        <col style="width: 200.75px">
                        <col style="width: 200.75px">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="tg-0pky"></th>
                            <th class="tg-7jts"><span style="font-weight:bold">Plus</span>
                                <p>Untuk individu</p> <a href="" class="btn btn-danger">Beli Sekarang</a>
                            </th>
                            <th class="tg-7jts"><span style="font-weight:bold">Family</span>
                                <p>Untuk keluarga</p> <a href="" class="btn btn-danger">Beli Sekarang</a>
                            </th>
                            <th class="tg-7jts"><span style="font-weight:bold">Professional</span>
                                <p>Untuk individu</p> <a href="" class="btn btn-danger">Beli Sekarang</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tg-0pky">Penyimpanan</td>
                            <td class="tg-c3ow text-muted">1.000 GB</td>
                            <td class="tg-c3ow text-muted">2.000 GB</td>
                            <td class="tg-c3ow text-muted">3.000 GB</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Pengguna</td>
                            <td class="tg-c3ow text-muted">1 pengguna</td>
                            <td class="tg-c3ow text-muted">5 pengguna</td>
                            <td class="tg-c3ow text-muted">10 pengguna</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Pemulihan file dan riwayat versi</td>
                            <td class="tg-c3ow text-muted">30 hari</td>
                            <td class="tg-c3ow text-muted">30 hari</td>
                            <td class="tg-c3ow text-muted">180 hari</td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Kontrol tautan bersama</td>
                            <td class="tg-c3ow"><i class="fa fa-xmark text-danger"></i></td>
                            <td class="tg-c3ow"><i class="fa fa-xmark text-danger"></i></td>
                            <td class="tg-c3ow"><i class="fa fa-check text-success"></i></td>
                        </tr>
                        <tr>
                            <td class="tg-0pky">Penguncian file</td>
                            <td class="tg-c3ow"><i class="fa fa-xmark text-danger"></i></td>
                            <td class="tg-c3ow"><i class="fa fa-xmark text-danger"></i></td>
                            <td class="tg-c3ow"><i class="fa fa-check text-success"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <section id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5 content-card mb-3">
                    <h4 class="mb-3">PrastCloud</h4>
                    <p>
                        PrastCloud adalah layanan penyedia data berbasis web yang dioperasikan oleh PrastCloud, Inc. PrastCloud menggunakan sistem penyimpanan berjaringan yang memungkinkan pengguna untuk menyimpan dan berbagi data serta berkas dengan pengguna lain di internet menggunakan sinkronisasi data.
                    </p>
                    <div class="social-links d-flex mt-4">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/iqbalprasettya/" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-5 content-card mb-3">
                    <div class="row">
                        <div class="col-md-6 sub-card">
                            <h4 class="mb-3">Useful Link</h4>
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="../index.php#about">About</a></li>
                            <li><a href="../blog.php?page=blog">Blog</a></li>
                            <li><a href="#pricing">Pricing</a></li>
                            <li><a href="../index.php#contact">Contact Us</a></li>
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
            <p>
                Designed by <a href="https://www.instagram.com/iqbalprasettya/">Iqbal Prasetya</a>
            </p>
        </div>
    </section>




    <script src="../assets/js/script.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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