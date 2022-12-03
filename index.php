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
  <title>PrastCloud</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- css -->
  <style>
    <?php include "assets/css/style.css";
    ?>
  </style>
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Owl Corousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <a id="nav-link" class="nav-link nav-link-grow-up" href="#home">Home</a>
          <a id="nav-link" class="nav-link nav-link-grow-up" href="#about">About</a>
          <a id="nav-link" class="nav-link nav-link-grow-up" href="pricing.php">Pricing</a>
          <a id="nav-link" class="nav-link nav-link-grow-up" href="#footer">Contact Us</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <!-- Jumbotron -->
  <section class="home" id="home">
    <div class="container">
      <div class="row justify-content-center">
        <?php

        $query = "SELECT * FROM hero ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($koneksi2, $query);

        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-md-5 about-text" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="500">
            <h2><?php echo $row['hero_text']; ?></h2>
          </div>
          <div class="col-md-5 about-image text-center" data-aos="fade-left" data-aos-duration="1300" data-aos-delay="1000">
            <img src="assets/img/hero/<?php echo $row['hero_image']; ?>" alt="">
          </div>
        <?php
          $no++;
        }
        ?>
      </div>
    </div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
      <defs>
        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
      </defs>
      <g class="parallax">
        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
      </g>
    </svg>
  </section>
  <!-- End Jumbotron -->
  <!-- Service Info -->
  <section class="service" id="service">
    <div class="container">
      <div class="stats">
        <div class="row text-content">
          <div class="col text-center" data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">
            <h3>Kenapa PrastCloud?</h3>
          </div>
        </div>
        <div class="row justify-content-center">
          <?php

          $query = "SELECT * FROM benefit ORDER BY id ASC";
          $result = mysqli_query($koneksi2, $query);

          if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi2) .
              " - " . mysqli_error($koneksi2));
          }
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <div class="card col-md-5" data-aos="fade-up" data-aos-duration="700" data-aos-delay="800">
              <div class="image">
                <img src="assets/img/benefit/<?php echo $row['benefit_image']; ?>" alt="">
              </div>
              <div class="text-info text-center">
                <h4 class="heading fw bold"><?php echo $row['benefit_heading']; ?></h4>
                <p><?php echo $row['benefit_text']; ?></p>
              </div>
            </div>
          <?php
            $no++;
          }
          ?>

        </div>
      </div>
    </div>
    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
<path fill="#f2f2f2" fill-opacity="1"
d="M0,128L48,112C96,96,192,64,288,90.7C384,117,480,203,576,208C672,213,768,139,864,122.7C960,107,1056,149,1152,165.3C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
</path>
</svg> -->
  </section>
  <!-- End Service Info -->


  <!-- About us -->
  <section class="about" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <?php

        $query = "SELECT * FROM about ORDER BY id ASC";
        $result = mysqli_query($koneksi2, $query);

        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="col-md-5 about-image text-center mb-3" data-aos="fade-right" data-aos-duration="700" data-aos-delay="700">
            <img src="assets/img/about/<?php echo $row['about_image']; ?>" alt="">
          </div>
          <div class="col-md-5 about-text mb-3">
            <h4 class="mb-3" data-aos="fade-up" data-aos-duration="700" data-aos-delay="600"> <span>Know </span> About Us
            </h4>
            <div class="text-about-fade" data-aos="fade-up" data-aos-duration="700" data-aos-delay="1200">
              <p>
                <?php echo $row['about_text']; ?>
              </p>

            </div>
            <a href="" class="btn btn-danger mt-3" data-aos="fade-up" data-aos-duration="700" data-aos-delay="1400">Know
              More</a>
          </div>
        <?php
          $no++;
        }
        ?>

      </div>
    </div>
  </section>
  <!-- End About us -->

  <!-- News -->
  <section class="news" id="news">
    <div class="container">
      <div class="row text-content">
        <div class="col text-center mb-3">
          <h2>News</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php

        $query = "SELECT * FROM news ORDER BY id ASC";
        $result = mysqli_query($koneksi2, $query);

        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="card col-md-5">
            <img src="assets/img/news/<?php echo $row['news_image']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['news_heading']; ?></h5>
              <p class="card-text"><?php echo $row['news_text']; ?></p>
              <a href="#" class="more">More</a>
            </div>
          </div>
        <?php
          $no++;
        }
        ?>


      </div>
    </div>
  </section>
  <!-- End News -->





  <!-- Testimonial -->

  <section id="testi" class="testi">
    <div class="container">
      <div class="row text-content">
        <div class="col text-center mb-3" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
          <h2>Testimonial</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div id="owl-carousel" class="owl-carousel owl-theme col-md-5 text-center" data-aos="fade-up" data-aos-duration="700" data-aos-delay="800">
          <?php

          $query = "SELECT * FROM testi ORDER BY id ASC";
          $result = mysqli_query($koneksi2, $query);

          if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi2) .
              " - " . mysqli_error($koneksi2));
          }
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
          ?>

            <div class="item content-card">
              <img class="rounded-circle mb-3" src="assets/img/testi/<?php echo $row['testi_image']; ?>" alt="">
              <h4><?php echo $row['testi_name']; ?></h4>
              <p><?php echo $row['testi_profession']; ?></p>
              <p class="quote">
                <?php echo $row['testi_text']; ?>
              </p>
            </div>
          <?php
            $no++;
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- End Testimonial -->
  <!-- Patner -->
  <section class="partner" id="partner">
    <div class="container">
      <div class="row text-content">
        <div class="col text-center mb-3">
          <h4>Partner</h4>
        </div>
      </div>
      <div id="owl-carousel2" class="row justify-content-center text-center owl-carousel owl-theme" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
        <?php

        $query = "SELECT * FROM partnerr ORDER BY id ASC";
        $result = mysqli_query($koneksi2, $query);

        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi2) .
            " - " . mysqli_error($koneksi2));
        }
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

          <div class="content-card col-md-6">
            <img src="assets/img/partner/<?php echo $row['partner_image']; ?>" alt="...">
          </div>
        <?php
          $no++;
        }
        ?>

      </div>
    </div>
  </section>
  <!-- End Patner -->

  <!-- Contact -->
  <section id="contact" class="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subject</label>
            <input type="text" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Massage</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <a href="" class="btn btn-danger">Send Massage</a>
        </div>
      </div>
    </div>
  </section>
  <!-- end Contact -->

  <!-- Footer -->
  <section id="footer" class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-5 content-card mb-3">
          <h4 class="mb-3">PrastCloud</h4>
          <p>
            PrastCloud adalah layanan penyedia data berbasis web yang dioperasikan oleh PrastCloud, Inc. PrastCloud menggunakan sistem penyimpanan berjaringan yang memungkinkan pengguna untuk menyimpan dan berbagi data serta berkas dengan pengguna lain di internet menggunakan sinkronisasi data.
          </p>
        </div>
        <div class="col-md-5 content-card mb-3">
          <div class="row">
            <div class="col-md-6 sub-card">
              <h4 class="mb-3">Useful Link</h4>
              <li><a href="#home">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#pricing">Pricing</a></li>
              <li><a href="#contact">Contact Us</a></li>
            </div>
            <div class="col-md-6 sub-card">
              <h4 class="mb-3">Maps</h4>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.5331624923656!2d106.7650867143138!3d-6.5804422661564015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4f906e40827%3A0x6b93a4462670547c!2sSMK%20Infokom%20Kota%20Bogor!5e0!3m2!1sid!2sid!4v1663212897161!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end Footer -->
  <!-- Copyright -->
  <section id="copyright" class="copyright">
    <div class="container text-center content-card">
      <p>
        ©Copyright 2022 <span>PrastCloud</span>. All Rights Reserved
      </p>
      <p>
        Designed by <a href="">Iqbal Prasetya</a>
      </p>
    </div>
  </section>




  <script src="assets/js/script.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AOS js -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
    });
  </script>
  <!-- Owl js  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#owl-carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayHoverPause: true,
      margin: 10,
      nav: false,
      items: 1,
    })

    $('#owl-carousel2').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: false,
      autoplay: true,
      autoplayTimeout: 1000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 2
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>
</body>

</html>