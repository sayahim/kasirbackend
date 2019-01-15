<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_kasir = KodeOtomatis($mysqli,"kasir","id_kasir","33", "5", "6");

  // $id_kasir = $_POST['id_kasir'];
  $nama_kasir = $_POST['nama_kasir'];
  $email = $_POST['email']; 
  $password = $_POST['password']; 
  $handphone = $_POST['handphone']; 
  $alamat = $_POST['alamat']; 

  $stmt = $mysqli->prepare("SELECT id_kasir FROM kasir WHERE email = ?");

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){

    $response['error'] = true;
    $response['message'] = 'Email Sudah Digunakan';
    $stmt->close();

  } else {

    $save = "INSERT INTO kasir (id_kasir, nama_kasir, email, password, handphone, alamat) VALUES ('$id_kasir', '$nama_kasir', '$email', '$password', '$handphone', '$alamat')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'User registered successfully'; 
          $response['id'] = $id_kasir; 

      }

  }

  echo json_encode($response);
