<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_mitra = $_POST['id_mitra']; 
  $nama_mitra = $_POST['nama_mitra']; 
  $email = $_POST['email']; 
  $password = $_POST['password']; 

  $stmt = $mysqli->prepare("SELECT id_mitra FROM mitra WHERE email = ?");

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  // if($stmt->num_rows > 0){

  //   $response['error'] = true;
  //   $response['message'] = 'Email Sudah Digunakan';
  //   $stmt->close();

  // } else {


    $save = $mysqli->prepare("UPDATE mitra SET
    nama_mitra = '$nama_mitra',
    email = '$email', 
    password = '$password'
    where id_mitra = '$id_mitra'");

      if ($save->execute()) {
          
          $response['error'] = false; 
          $response['message'] = 'User update successfully'; 
          $response['id'] = $id_mitra; 

      } else {

          $response['error'] = true; 
          $response['message'] = 'Gagal'; 
          $response['id'] = $id_mitra; 

      }

  // }

  echo json_encode($response);
