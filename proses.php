<?php
session_start();
require 'koneksi.php';

// proses login
if (!empty($_GET['aksi'] == 'login')) {
  // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM user WHERE username = ? AND password = md5(?)";
  $row = $koneksi->prepare($sql);
  $row->execute(array($user, $pass));
  $count = $row->rowCount();

  if ($count > 0) {
    $result = $row->fetch();
    $_SESSION['ADMIN'] = $result;
    // status yang diberikan
    echo "<script>window.location='admin.php';</script>";
  } else {
    echo "<script>window.location='login.php?get=failed';</script>";
  }
}

if (!empty($_GET['aksi'] == 'logout')) {
  session_destroy();
  echo "<script>window.location='login.php?signout=success';</script>";
}


// TAMBAH Hero
if (!empty($_GET['aksi'] == "add-about")) {
  $about_text = $_POST['about_text'];
  $about_image_name = $_FILES['about_image']['name'];
  $about_image_size = $_FILES['about_image']['size'];

  if ($about_image_size > 2097152) {

    header("location:admin.php?page=add-about&pesan=size");
  } else {

    if ($about_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $about_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['about_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $about_image_name_new = $tanggal . '-' . $about_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/about/' . $about_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO about VALUES ('', '$about_text', '$about_image_name_new')");

        if ($query) {
          header("location:admin.php?page=add-about&pesan=berhasil");
        } else {
          header("location:admin.php?page=add-about&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=add-about&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO about(about_text) VALUES ('$about_text')");

      if ($query) {
        header("location:admin.php?page=add-about&pesan=berhasil");
      } else {
        header("location:admin.php?page=add-about&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH Hero

// Edit Hero
if (!empty($_GET['aksi'] == "edit-hero")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $hero_text = $_POST['hero_text'];
      $hero_image_name = $_FILES['hero_image']['name'];
      $hero_image_size = $_FILES['hero_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:index.php?pesan=size");
    } else {

      if ($hero_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $hero_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['hero_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $hero_image_new = $tanggal . '-' . $hero_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT hero_image FROM hero WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/hero/" . $foto_lama['hero_image']);

          move_uploaded_file($file_tmp, 'assets/img/hero/' . $hero_image_new);

          $query = mysqli_query($koneksi2, "UPDATE hero SET hero_text='$hero_text', hero_image='$hero_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=hero&pesan=berhasil");
          } else {
            header("location:admin.php?page=hero&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=hero&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE hero SET hero_text='$hero_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=hero&pesan=berhasil");
        } else {
          header("location:admin.php?page=hero&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=hero");
  }
}
//  END Edit Hero


// TAMBAH Benefit
if (!empty($_GET['aksi'] == "add-benefit")) {
  $benefit_heading = $_POST['benefit_heading'];
  $benefit_text = $_POST['benefit_text'];
  $benefit_image_name = $_FILES['benefit_image']['name'];
  $benefit_image_size = $_FILES['benefit_image']['size'];

  if ($benefit_image_size > 2097152) {

    header("location:admin.php?page=add-hero&pesan=size");
  } else {

    if ($benefit_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $benefit_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['benefit_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $benefit_image_name_new = $tanggal . '-' . $benefit_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/benefit/' . $benefit_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO benefit VALUES ('', '$benefit_heading',  '$benefit_text', '$benefit_image_name_new')");

        if ($query) {
          header("location:admin.php?page=add-benefit&pesan=berhasil");
        } else {
          header("location:admin.php?page=add-benefit&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=add-benefit&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO benefit(benefit_heading, benefit_text) VALUES ('$benefit_heading', '$benefit_text')");

      if ($query) {
        header("location:admin.php?page=add-benefit&pesan=berhasil");
      } else {
        header("location:admin.php?page=add-benefit&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH Benefit

// TAMBAH News
if (!empty($_GET['aksi'] == "add-news")) {
  $news_heading = $_POST['news_heading'];
  $news_text = $_POST['news_text'];
  $news_image_name = $_FILES['news_image']['name'];
  $news_image_size = $_FILES['news_image']['size'];

  if ($news_image_size > 2097152) {

    header("location:admin.php?page=add-hero&pesan=size");
  } else {

    if ($news_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $news_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['news_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $news_image_name_new = $tanggal . '-' . $news_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/news/' . $news_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO news VALUES ('', '$news_heading',  '$news_text', '$news_image_name_new')");

        if ($query) {
          header("location:admin.php?page=news&pesan=tambah");
        } else {
          header("location:admin.php?page=news&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=news&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO news(news_heading, news_text) VALUES ('$news_heading', '$news_text')");

      if ($query) {
        header("location:admin.php?page=news&pesan=tambah");
      } else {
        header("location:admin.php?page=news&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH News

// TAMBAH Testi
if (!empty($_GET['aksi'] == "add-testi")) {
  $testi_name = $_POST['testi_name'];
  $testi_profession = $_POST['testi_profession'];
  $testi_text = $_POST['testi_text'];
  $testi_image_name = $_FILES['testi_image']['name'];
  $testi_image_size = $_FILES['testi_image']['size'];

  if ($testi_image_size > 2097152) {

    header("location:admin.php?page=add-hero&pesan=size");
  } else {

    if ($testi_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $testi_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['testi_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $testi_image_name_new = $tanggal . '-' . $testi_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/testi/' . $testi_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO testi VALUES ('', '$testi_name',  '$testi_profession', '$testi_text', '$testi_image_name_new')");

        if ($query) {
          header("location:admin.php?page=testi&pesan=tambah");
        } else {
          header("location:admin.php?page=testi&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=testi&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO testi(testi_name, testi_profession, testi_text) VALUES ('$testi_name', '$testi_profession', '$testi_text')");

      if ($query) {
        header("location:admin.php?page=testi&pesan=tambah");
      } else {
        header("location:admin.php?page=testi&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH Testi


// TAMBAH Partner
if (!empty($_GET['aksi'] == "add-partner")) {
  $partner_image_name = $_FILES['partner_image']['name'];
  $partner_image_size = $_FILES['partner_image']['size'];

  if ($partner_image_size > 2097152) {

    header("location:admin.php?page=add-partner&pesan=size");
  } else {

    if ($partner_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $partner_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['partner_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $partner_image_name_new = $tanggal . '-' . $partner_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/partner/' . $partner_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO partnerr VALUES ('', '$partner_image_name_new')");

        if ($query) {
          header("location:admin.php?page=partner&pesan=berhasil");
        } else {
          header("location:admin.php?page=partner&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=partner&pesan=ekstensi");
      }
    } 
  }
}
//  END TAMBAH Partner





// Edit Benefit
if (!empty($_GET['aksi'] == "edit-benefit")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $benefit_heading = $_POST['benefit_heading'];
      $benefit_text = $_POST['benefit_text'];
      $benefit_image_name = $_FILES['benefit_image']['name'];
      $benefit_image_size = $_FILES['benefit_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:index.php?pesan=size");
    } else {

      if ($benefit_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $benefit_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['benefit_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $benefit_image_new = $tanggal . '-' . $benefit_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT benefit_image FROM benefit WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/benefit/" . $foto_lama['benefit_image']);

          move_uploaded_file($file_tmp, 'assets/img/benefit/' . $benefit_image_new);

          $query = mysqli_query($koneksi2, "UPDATE benefit SET benefit_heading='$benefit_heading', benefit_text='$benefit_text', benefit_image='$benefit_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=benefit&pesan=berhasil");
          } else {
            header("location:admin.php?page=benefit&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=benefit&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE benefit SET benefit_heading='$benefit_heading', benefit_text='$benefit_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=benefit&pesan=berhasil");
        } else {
          header("location:admin.php?page=benefit&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=benefit");
  }
}
//  END Delete Benefit

// Edit about
if (!empty($_GET['aksi'] == "edit-about")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $about_text = $_POST['about_text'];
      $about_image_name = $_FILES['about_image']['name'];
      $about_image_size = $_FILES['about_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:index.php?pesan=size");
    } else {

      if ($about_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $about_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['about_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $about_image_new = $tanggal . '-' . $about_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT about_image FROM about WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/about/" . $foto_lama['about_image']);

          move_uploaded_file($file_tmp, 'assets/img/about/' . $about_image_new);

          $query = mysqli_query($koneksi2, "UPDATE about SET about_text='$about_text', about_image='$about_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=about&pesan=berhasil");
          } else {
            header("location:admin.php?page=about&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=about&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE about SET about_text='$about_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=about&pesan=berhasil");
        } else {
          header("location:admin.php?page=about&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=about");
  }
}
//  END Delete About

// Edit News
if (!empty($_GET['aksi'] == "edit-news")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $news_heading = $_POST['news_heading'];
      $news_text = $_POST['news_text'];
      $news_image_name = $_FILES['news_image']['name'];
      $news_image_size = $_FILES['news_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:index.php?pesan=size");
    } else {

      if ($news_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $news_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['news_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $news_image_new = $tanggal . '-' . $news_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT news_image FROM news WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/news/" . $foto_lama['news_image']);

          move_uploaded_file($file_tmp, 'assets/img/news/' . $news_image_new);

          $query = mysqli_query($koneksi2, "UPDATE news SET news_heading='$news_heading', news_text='$news_text', news_image='$news_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=news&pesan=berhasil");
          } else {
            header("location:admin.php?page=news&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=news&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE news SET news_heading='$news_heading', news_text='$news_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=news&pesan=berhasil");
        } else {
          header("location:admin.php?page=news&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=news");
  }
}
//  END Edit news


// Delete News
if (!empty($_GET['aksi'] == "delete-news")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT news_image FROM news WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/news/" . $foto_lama['news_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM news WHERE id='$id'");
      if ($query) {
        header("location:admin.php?page=news&pesan=hapus");
      } else {
        header("location:admin.php?page=news&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin.php?page=news");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin.php?page=news");
  }
}
//  END Delete news




// Edit Testi
if (!empty($_GET['aksi'] == "edit-testi")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $testi_name = $_POST['testi_name'];
      $testi_profession = $_POST['testi_profession'];
      $testi_text = $_POST['testi_text'];
      $testi_image_name = $_FILES['testi_image']['name'];
      $testi_image_size = $_FILES['testi_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:index.php?pesan=size");
    } else {

      if ($testi_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $testi_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['testi_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $testi_image_new = $tanggal . '-' . $testi_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT testi_image FROM testi WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/testi/" . $foto_lama['testi_image']);

          move_uploaded_file($file_tmp, 'assets/img/testi/' . $testi_image_new);

          $query = mysqli_query($koneksi2, "UPDATE testi SET testi_name='$testi_name', testi_profession='$testi_profession', testi_text='$testi_text', testi_image='$testi_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=testi&pesan=berhasil");
          } else {
            header("location:admin.php?page=testi&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=testi&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE testi SET testi_name='$testi_name', testi_profession='$testi_profession', testi_text='$testi_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=testi&pesan=berhasil");
        } else {
          header("location:admin.php?page=testi&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=testi");
  }
}
//  END Edit Testi


// Delete News
if (!empty($_GET['aksi'] == "delete-testi")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT testi_image FROM testi WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/testi/" . $foto_lama['testi_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM testi WHERE id='$id'");
      if ($query) {
        header("location:admin.php?page=testi&pesan=hapus");
      } else {
        header("location:admin.php?page=testi&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin.php?page=testi");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin.php?page=testi");
  }
}
//  END Delete testi


// Delete partner
if (!empty($_GET['aksi'] == "delete-partner")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT partner_image FROM partnerr WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/partner/" . $foto_lama['partner_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM partnerr WHERE id='$id'");
      if ($query) {
        header("location:admin.php?page=partner&pesan=hapus");
      } else {
        header("location:admin.php?page=partner&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin.php?page=partner");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin.php?page=partner");
  }
}
//  END Delete partner