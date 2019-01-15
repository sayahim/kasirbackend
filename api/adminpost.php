<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_admin = KodeOtomatis($mysqli,"admin","id_admin","11", "5", "6");

  // $id_kasir = $_POST['id_kasir'];
  // $id_admin = $_POST['id_admin'];
  $nama_admin = $_POST['nama_admin'];
  $email = $_POST['email']; 
  $password = $_POST['password']; 
  $status = $_POST['status']; 

  $stmt = $mysqli->prepare("SELECT id_admin FROM admin WHERE email = ?");

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){

    $response['error'] = true;
    $response['message'] = 'Email Sudah Digunakan';
    $stmt->close();

  } else {

    $save = "INSERT INTO admin (id_admin, nama_admin, email, password, status) VALUES ('$id_admin', '$nama_admin', '$email', '$password', '$status')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'User registered successfully'; 
          $response['id'] = $id_admin; 

      }

  }

  echo json_encode($response);
