<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

    $id_mitra =$_POST['id_mitra'];


       $stmt= $mysqli->prepare("SELECT id_reward, id_mitra, jumlah_poin, hadiah FROM reward WHERE id_mitra  = ?");

       $stmt->bind_param("s", $id_mitra);

       $stmt->execute();
   
       $stmt->store_result();
       
       if($stmt->num_rows > 0){
       
           $stmt->bind_result($id_reward, $id_mitra, $jumlah_poin, $hadiah);
           $stmt->fetch();
           
           $reward = array(
           'id_reward'=>$id_reward, 
           'id_mitra'=>$id_mitra, 
           'jumlah_poin'=>$jumlah_poin,
           'hadiah'=>$hadiah

           );

           $response['error'] = false; 
           $response['message'] = 'Sukses';
           $response['reward'] = $reward;  

        } else {

            $response['error'] = false; 
           $response['message'] = 'Gagal';
           $response['reward'] = $reward;  

        }

 echo json_encode($response);
