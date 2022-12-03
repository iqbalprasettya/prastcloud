<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {
      
      // Mengambil ID diURL
      $id = $_GET['id'];
  
      // Mengambil data siswa_foto didalam table siswa
      $get_foto = "SELECT news_image FROM news WHERE id='$id'";
      $data_foto = mysqli_query($koneksi2, $get_foto); 
          // Mengubah data yang diambil menjadi Array
      $foto_lama = mysqli_fetch_array($data_foto);
  
          // Menghapus Foto lama didalam folder FOTO
      unlink("assets/img/news/".$foto_lama['news_image']);    
  
      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi2,"DELETE FROM news WHERE id='$id'");
      if ($query) {
        header("location:index.php?pesan=hapus");
      }else{
        header("location:index.php?pesan=gagalhapus");
      }
      
    }else{
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:index.php");
    }
  }else{
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:index.php");
  }
