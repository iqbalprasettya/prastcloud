<?php
session_start();
require 'koneksi.php';

date_default_timezone_set("Asia/Jakarta");

// proses login
if (!empty($_GET['aksi'] == 'login')) {
  // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
  $user = $_POST['user_username'];
  $pass = $_POST['user_password'];
  $sql = "SELECT * FROM user WHERE user_username = ? AND user_password = md5(?)";
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

    header("location:admin.php?page=about&pesan=size");
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
      header("location:admin.php?page=hero&pesan=size");
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


// TAMBAH service
if (!empty($_GET['aksi'] == "add-service")) {
  $service_heading = $_POST['service_heading'];
  $service_text = $_POST['service_text'];
  $service_image_name = $_FILES['service_image']['name'];
  $service_image_size = $_FILES['service_image']['size'];

  if ($service_image_size > 2097152) {

    header("location:admin.php?page=service&pesan=size");
  } else {

    if ($service_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $service_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['service_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $service_image_name_new = $tanggal . '-' . $service_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/service/' . $service_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO service VALUES ('', '$service_heading',  '$service_text', '$service_image_name_new')");

        if ($query) {
          header("location:admin.php?page=add-service&pesan=berhasil");
        } else {
          header("location:admin.php?page=add-service&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=add-service&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO service(service_heading, service_text) VALUES ('$service_heading', '$service_text')");

      if ($query) {
        header("location:admin.php?page=add-service&pesan=berhasil");
      } else {
        header("location:admin.php?page=add-service&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH service

// TAMBAH blog
if (!empty($_GET['aksi'] == "add-blog")) {
  $blog_date = date('Y-m-d h:i:s');
  $blog_heading = $_POST['blog_heading'];
  $blog_text = $_POST['blog_text'];
  $blog_image_name = $_FILES['blog_image']['name'];
  $blog_image_size = $_FILES['blog_image']['size'];

  if ($blog_image_size > 2097152) {

    header("location:admin.php?page=blog&pesan=size");
  } else {

    if ($blog_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $blog_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['blog_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $blog_image_name_new = $tanggal . '-' . $blog_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_name_new);
        $query = mysqli_query($koneksi2, "INSERT INTO blog VALUES ('', '$blog_date', '$blog_heading',  '$blog_text', '$blog_image_name_new')");

        if ($query) {
          header("location:admin.php?page=blog&pesan=tambah");
        } else {
          header("location:admin.php?page=blog&pesan=gagal");
        }
      } else {
        header("location:admin.php?page=blog&pesan=ekstensi");
      }
    } else {

      $query = mysqli_query($koneksi2, "INSERT INTO blog(blog_date, blog_heading, blog_text) VALUES ('$blog_date', '$blog_heading', '$blog_text')");

      if ($query) {
        header("location:admin.php?page=blog&pesan=tambah");
      } else {
        header("location:admin.php?page=blog&pesan=gagal");
      }
    }
  }
}
//  END TAMBAH blog

// TAMBAH Testi
if (!empty($_GET['aksi'] == "add-testi")) {
  $testi_name = $_POST['testi_name'];
  $testi_profession = $_POST['testi_profession'];
  $testi_text = $_POST['testi_text'];
  $testi_image_name = $_FILES['testi_image']['name'];
  $testi_image_size = $_FILES['testi_image']['size'];

  if ($testi_image_size > 2097152) {

    header("location:admin.php?page=testi&pesan=size");
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

    header("location:admin.php?page=partner&pesan=size");
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
        $query = mysqli_query($koneksi2, "INSERT INTO partners VALUES ('', '$partner_image_name_new')");

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

// TAMBAH messages
if (!empty($_GET['aksi'] == "add-messages")) {
  if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
    //your site secret key
    $secret = '6LcO6XojAAAAAFfOAeSfRM_8jzpzl-Xs1ac8nHDw';
    //get verify response data
    $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $response = json_decode($verify);
    if ($response->success) {
      $messages_date = date('Y-m-d h:i:s');
      $messages_nama = $_POST['messages_nama'];
      $messages_email = $_POST['messages_email'];
      $messages_subjek = $_POST['messages_subjek'];
      $messages_text = $_POST['messages_text'];

      $query = mysqli_query($koneksi2, "INSERT INTO messages(messages_date, messages_nama, messages_email, messages_subjek, messages_text) VALUES ('$messages_date', '$messages_nama', '$messages_email', '$messages_subjek', '$messages_text')");

      if ($query) {
        echo '<script>alert("Pesan Berhasil Terkirim :)")</script>';
        echo '<script>window.location = "index.php#contact";</script>';
      } else {
        echo '<script>alert("Pesan Gagal Terkirim :(")</script>';
        echo '<script>window.location = "index.php#contact";</script>';
      }
    } else {
      exit('Google reCAPTCHA verification failed. please try again');
    }
  } else {
    exit('Please check recaptcha box');
  }
}
//  END TAMBAH messages



// Edit service
if (!empty($_GET['aksi'] == "edit-service")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $service_heading = $_POST['service_heading'];
      $service_text = $_POST['service_text'];
      $service_image_name = $_FILES['service_image']['name'];
      $service_image_size = $_FILES['service_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:admin.php?page=service&pesan=size");
    } else {

      if ($service_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $service_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['service_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $service_image_new = $tanggal . '-' . $service_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT service_image FROM service WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/service/" . $foto_lama['service_image']);

          move_uploaded_file($file_tmp, 'assets/img/service/' . $service_image_new);

          $query = mysqli_query($koneksi2, "UPDATE service SET service_heading='$service_heading', service_text='$service_text', service_image='$service_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=service&pesan=berhasil");
          } else {
            header("location:admin.php?page=service&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=service&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE service SET service_heading='$service_heading', service_text='$service_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=service&pesan=berhasil");
        } else {
          header("location:admin.php?page=service&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=service");
  }
}
//  END Delete service

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
      header("location:admin.php?page=about&pesan=size");
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

// Edit blog
if (!empty($_GET['aksi'] == "edit-blog")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $blog_date = date('Y-m-d h:i:s');
      $blog_heading = $_POST['blog_heading'];
      $blog_text = $_POST['blog_text'];
      $blog_image_name = $_FILES['blog_image']['name'];
      $blog_image_size = $_FILES['blog_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:admin.php?page=blog&pesan=size");
    } else {

      if ($blog_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $blog_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['blog_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $blog_image_new = $tanggal . '-' . $blog_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/blog/" . $foto_lama['blog_image']);

          move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_new);

          $query = mysqli_query($koneksi2, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text', blog_image='$blog_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin.php?page=blog&pesan=berhasil");
          } else {
            header("location:admin.php?page=blog&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=blog&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text' WHERE id='$id'");

        if ($query) {
          header("location:admin.php?page=blog&pesan=berhasil");
        } else {
          header("location:admin.php?page=blog&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=blog");
  }
}
//  END Edit blog

// Edit blog
if (!empty($_GET['aksi'] == "edit-profile")) {
  if (isset($_POST['id_login'])) {
    if ($_POST['id_login'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id_login = $_POST['id_login'];
      $user_date = date('Y-m-d h:i:s');
      $user_username = $_POST['user_username'];
      $fullname = $_POST['fullname'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $user_twitter = $_POST['user_twitter'];
      $user_fb = $_POST['user_fb'];
      $user_ig = $_POST['user_ig'];
      $profile_image_name = $_FILES['profile_image']['name'];
      $profile_image_size = $_FILES['profile_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($foto_size > 2097152) {
      header("location:admin.php?page=user&pesan=size");
    } else {

      if ($profile_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $profile_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $profile_image_new = $tanggal . '-' . $profile_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT profile_image FROM user WHERE id_login='$id_login'";
          $data_foto = mysqli_query($koneksi2, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/user/" . $foto_lama['profile_image']);

          move_uploaded_file($file_tmp, 'assets/img/user/' . $profile_image_new);

          $query = mysqli_query($koneksi2, "UPDATE user SET user_date='$user_date', user_username='$user_username', fullname='$fullname', phone='$phone', email='$email', user_twitter='$user_twitter', user_fb='$user_fb', user_ig='$user_ig', profile_image='$profile_image_new' WHERE id_login='$id_login'");

          if ($query) {
            header("location:admin.php?page=user&pesan=berhasil");
          } else {
            header("location:admin.php?page=user&pesan=gagal");
          }
        } else {
          header("location:admin.php?page=user&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi2, "UPDATE user SET user_date='$user_date', user_username='$user_username', fullname='$fullname', phone='$phone', email='$email', user_twitter='$user_twitter', user_fb='$user_fb', user_ig='$user_ig' WHERE id_login='$id_login'");

        if ($query) {
          header("location:admin.php?page=user&pesan=berhasil");
        } else {
          header("location:admin.php?page=user&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin.php?page=user");
  }
}
//  END Edit user

// Change Password user
if (!empty($_GET['aksi'] == "change-pass")) {
  $password_lama    = md5($_POST['password_lama']);
  $user_username    = $_POST['user_username'];
  // $password_baru    = md5($_POST['password_baru']);
  // $konf_password    = md5($_POST['konf_password']);

  $query = mysqli_query($koneksi2, "SELECT * FROM user WHERE user_username = '$user_username' AND user_password = '$password_lama'");
  $data = mysqli_fetch_array($query);

  if ($data) {
    $password_baru    = $_POST['password_baru'];
    $konf_password    = $_POST['konf_password'];

    if ($password_baru == $konf_password) {

      $passmd5 = md5($konf_password);
      $queryubah = mysqli_query($koneksi2, "UPDATE user SET user_password = '$passmd5' WHERE id_login = '$data[id_login]'");
      
      if ($queryubah) {
        header("location:admin.php?page=user&pesan=successpass");
      }
    } else {
      header("location:admin.php?page=user&pesan=failedconfpass");
    }

  } else {
    header("location:admin.php?page=user&pesan=failedpass");
  }

  // $querycekpass = mysqli_query($koneksi2, "SELECT * FROM user WHERE user_password = '$password_lama'");
  // $count = mysqli_num_rows($querycekpass);

  // if ($count >= 1) {
  //   $updatepass = mysqli_query($koneksi2, "UPDATE user SET user_password = '$password_baru' WHERE id_login = 1");

  //   if ($updatepass) {
  //     header("location:admin.php?page=user&pesan=successpass");
  //   } else {
  //     header("location:admin.php?page=user&pesan=failedpass");
  //   }
  // }
  
}
// End Change Password user



// Delete blog
if (!empty($_GET['aksi'] == "delete-blog")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/blog/" . $foto_lama['blog_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM blog WHERE id='$id'");
      if ($query) {
        header("location:admin.php?page=blog&pesan=hapus");
      } else {
        header("location:admin.php?page=blog&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin.php?page=blog");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin.php?page=blog");
  }
}
//  END Delete blog




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
      header("location:admin.php?page=testi&pesan=size");
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


// Delete blog
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

      $get_foto = "SELECT partner_image FROM partners WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/partner/" . $foto_lama['partner_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2, "DELETE FROM partners WHERE id='$id'");
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

// Delete Messages
if (!empty($_GET['aksi'] == "delete-messages")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $query = mysqli_query($koneksi2, "DELETE FROM messages WHERE id='$id'");
      if ($query) {
        header("location:admin.php?page=dashboard");
      } else {
        header("location:admin.php?page=dashboard");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin.php?page=dashboard");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin.php?page=dashboard");
  }
}
//  END Delete Messages