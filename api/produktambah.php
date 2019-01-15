<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_produk = KodeOtomatis($mysqli,"produk","id_produk","44", "5", "6");

  $nama_produk = $_POST['nama_produk']; 
  $harga = $_POST['harga']; 
  $harga_gojek = $_POST['harga_gojek']; 
  $harga_grab = $_POST['harga_grab']; 
  $kategori = $_POST['kategori']; 

  $lokasi_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
 

  $nama_file = $id_produk.'.jpg';

  if(!empty($lokasi_file)) {
    
      if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){

        echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
        //ARAHKAN
        echo "<script>window.location='javascript:history.go(-1)';</script>";

      }else {

          //menjalankan
          if(is_dir("../gambar/produk")) {

            $tempat_gambar = "../gambar/produk";

          } else {

            mkdir("../gambar/produk");
            $tempat_gambar = "../gambar/produk";

          }

        UploadImage($nama_file, $tempat_gambar, "gambar");

      }
  
  } else {

    $nama_file = $id_produk.'.jpg';

  }


   $save = "INSERT INTO produk (id_produk, nama_produk, gambar_produk, harga, harga_gojek, harga_grab, kategori ) VALUES ('$id_produk', '$nama_produk', '$nama_file', '$harga', '$harga_gojek', '$harga_grab', '$kategori')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'User registered successfully'; 
          $response['id'] = $id_admin; 

  }

  echo json_encode($response);