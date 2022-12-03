<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
require 'koneksi.php';
if (!empty($_SESSION['ADMIN'])) {
} else {
  echo '<script>alert("Required Login Authorization!");window.location="login.php"</script>';
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>PrastCloud - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <style>
    <?php include "assets/css/sb-admin.css";
    ?>
  </style>


  <style>
    body {
      background-color: #051219;
    }

    .navbar {
      background-color: #06202c;
    }

    .card {
      background-color: #06202c;
      color: #fff;
    }
  </style>
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="admin.php">PrastCloud Admin</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
<div class="input-group">
<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
<button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
</div>
</form> -->
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <?php if (!empty($_SESSION['ADMIN'])) {
          ?>
            <li><a class="dropdown-item" href="proses.php?aksi=logout">Logout</a></li>
          <?php
          } else {
          ?>
            <li><a class="dropdown-item" href="login.php">Login</a></li>
          <?php
          } ?>

        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">
              Core
            </div>
            <a class="nav-link" href="admin.php?page=dashboard">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">
              Interface
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon">
                <i class="fas fa-columns"></i>
              </div>
              Layouts
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="admin.php?page=hero">Section Hero</a>
                <a class="nav-link" href="admin.php?page=benefit">Section Benefit</a>
                <a class="nav-link" href="admin.php?page=about">Section About</a>
                <a class="nav-link" href="admin.php?page=news">Section News</a>
                <a class="nav-link" href="admin.php?page=testi">Section Testimonial</a>
                <a class="nav-link" href="admin.php?page=partner">Section Partner</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Pages
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Authentication
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="login.html">Login</a>
                    <a class="nav-link" href="register.html">Register</a>
                    <a class="nav-link" href="password.html">Forgot Password</a>
                  </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                  Error
                  <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                  </div>
                </a>
                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="401.html">401 Page</a>
                    <a class="nav-link" href="404.html">404 Page</a>
                    <a class="nav-link" href="500.html">500 Page</a>
                  </nav>
                </div>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">
              Setting
            </div>
            <a class="nav-link" href="charts.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-user"></i>
              </div>
              Users
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">
            Logged in as:
          </div>

        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4 text-white">
          <?php include "page/admin/config.php"; ?>
        </div>
      </main>
      <!-- <footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4 text-white">

</div>
</footer> -->
    </div>
  </div>
  <script src='https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js'></script>
  <script src="assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="assets/js/sb-admin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script>
    window.addEventListener('DOMContentLoaded', event => {
      // Simple-DataTables
      // https://github.com/fiduswriter/Simple-DataTables/wiki

      const datatablesSimple = document.getElementById('datatablesSimple');
      if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
      }
    });

    // tinymce
    tinymce.init({
      selector: '#editor1',
      menubar: false,
      statusbar: false,
      plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
      toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
      skin: 'bootstrap',
      toolbar_drawer: 'floating',
      min_height: 200,
      autoresize_bottom_margin: 16,
      setup: (editor) => {
        editor.on('init', () => {
          editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
        });
        editor.on('focus', () => {
          editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
            editor.getContainer().style.borderColor = "#80bdff"
        });
        editor.on('blur', () => {
          editor.getContainer().style.boxShadow = "",
            editor.getContainer().style.borderColor = ""
        });
      }
    });
    tinymce.init({
      selector: '#editor2',
      menubar: false,
      statusbar: false,
      plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
      toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
      skin: 'bootstrap',
      toolbar_drawer: 'floating',
      min_height: 250,
      autoresize_bottom_margin: 16,
      setup: (editor) => {
        editor.on('init', () => {
          editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
        });
        editor.on('focus', () => {
          editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
            editor.getContainer().style.borderColor = "#80bdff"
        });
        editor.on('blur', () => {
          editor.getContainer().style.boxShadow = "",
            editor.getContainer().style.borderColor = ""
        });
      }
    });
    tinymce.init({
      selector: '#editor3',
      menubar: false,
      statusbar: false,
      plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
      toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help fullscreen ',
      skin: 'bootstrap',
      toolbar_drawer: 'floating',
      min_height: 450,
      autoresize_bottom_margin: 16,
      setup: (editor) => {
        editor.on('init', () => {
          editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
        });
        editor.on('focus', () => {
          editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
            editor.getContainer().style.borderColor = "#80bdff"
        });
        editor.on('blur', () => {
          editor.getContainer().style.boxShadow = "",
            editor.getContainer().style.borderColor = ""
        });
      }
    });
    // end tinymce
  </script>
</body>

</html>