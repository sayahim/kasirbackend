<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_mitra = KodeOtomatis($mysqli,"mitra","id_mitra","22", "5", "6");
  $id_reward = KodeOtomatis($mysqli,"reward","id_reward","66", "5", "6");


  $nama_mitra = $_POST['nama_mitra']; 
  $email = $_POST['email']; 
  $password = $_POST['password']; 

  $stmt = $mysqli->prepare("SELECT id_mitra FROM mitra WHERE email = ?");

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if($stmt->num_rows > 0){

    $response['error'] = true;
    $response['message'] = 'Email Sudah Digunakan';
    $stmt->close();

  } else {

    $save = "INSERT INTO mitra (id_mitra, nama_mitra, email, password) VALUES ('$id_mitra', '$nama_mitra', '$email', '$password')";

      if ($mysqli->query($save)) {
          
          $response['error'] = false; 
          $response['message'] = 'User registered Sukses'; 
          $response['id'] = $id_mitra; 

     }

    $savereward = "INSERT INTO reward (id_reward, id_mitra, jumlah_poin, hadiah) VALUES ('$id_reward', '$id_mitra', '0', '100.000')";

      if ($mysqli->query($savereward)) {
          
          $response['reward'] = 'sukses'; 

      }



  }

  echo json_encode($response);
