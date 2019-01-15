<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_produk = $_POST['id_produk'];

  // echo $id_produk;
  $ambil = caridata($mysqli,"SELECT gambar_produk FROM produk WHERE id_produk = '$id_produk'");
  $stmt = $mysqli->prepare("DELETE FROM produk where id_produk=?");
  $stmt->bind_param("s",mysqli_real_escape_string($mysqli, $_POST['id_produk'])); 


  if ($stmt->execute()) { 

      $response['error'] = false; 
      $response['message'] = 'Produk berhasil dihapus'; 
      $response['id'] = $id_produk; 

      if(is_file("../gambar/produk/".$ambil) && $ambil!='default.jpg')
        {
            unlink("../gambar/produk/".$ambil);
            unlink("../gambar/produk/small_".$ambil);
        }


  } else {

      $response['error'] = true; 
      $response['message'] = 'Gagal'; 
      $response['id'] = $id_produk; 

  }

  echo json_encode($response);