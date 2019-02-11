<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_kasir = $_POST['id_kasir'];
  $nama_kasir = $_POST['nama_kasir'];
  $email = $_POST['email']; 
  $password = $_POST['password']; 
  $handphone = $_POST['handphone']; 
  $alamat = $_POST['alamat']; 

  $stmt = $mysqli->prepare("SELECT id_kasir FROM kasir WHERE email = ?");

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  // if($stmt->num_rows > 0){

  //   $response['error'] = true;
  //   $response['message'] = 'Email Sudah Digunakan';
  //   $stmt->close();

  // } else {


    $save = $mysqli->prepare("UPDATE kasir SET
    nama_kasir = '$nama_kasir',
    email = '$email', 
    password = '$password', 
    handphone = '$handphone',  
    alamat = '$alamat' 
    where id_kasir = '$id_kasir'");
 

      if ($save->execute()) {
          
          $response['error'] = false; 
          $response['message'] = 'User update successfully'; 
          $response['id'] = $id_kasir; 

      } else{

          $response['error'] = true; 
          $response['message'] = 'Gagal'; 
          $response['id'] = $id_kasir; 

      }

  // }

  echo json_encode($response);
