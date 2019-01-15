<?php require_once '../setting/koneksi.php';

  // $query="SELECT * from jadwal";
    $query="SELECT * FROM pemesanan join detail_pemesanan on pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan join produk on detail_pemesanan.id_produk = produk.id_produk ";

    //join kasir on pemesanan.id_kasir = kasir.id_kasir join mitra on pemesanan.id_kasir = mitra.id_mitra 
  
 $result=$mysqli->query($query);
  $num_result=$result->num_rows;
  $arr=array();
  if ($num_result > 0 ) { 
      while ($hasil=mysqli_fetch_assoc($result)) {
      // extract($data);
      $arr['pemesanan'][] = $hasil;
      //print_r($arr);
   }
} 

echo json_encode($arr);

