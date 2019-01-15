<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_reward = $_POST['id_reward'];
  $id_mitra = $_POST['id_mitra']; 
  $jumlah_poin = $_POST['jumlah_poin']; 


    $save = $mysqli->prepare("UPDATE reward SET
    id_mitra = '$id_mitra', 
    jumlah_poin = '$jumlah_poin',
    hadiah = '100.000'
    where id_reward = '$id_reward'");

      if ($save->execute()) {
          
          $response['error'] = false; 
          $response['id_mitra'] = $id_mitra; 
          $response['jumlah_poin'] = $jumlah_poin; 
          $response['message'] = 'Reward update successfully'; 
          $response['id'] = $id_reward; 

      } else {

          $response['error'] = true; 
          $response['id'] = $id_reward; 

       }

echo json_encode($response);
