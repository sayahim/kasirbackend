<?php 
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

  $response = array();

  $id_pemesanan = KodeOtomatis($mysqli,"pemesanan","id_pemesanan","55","5","6");


  $produk = $_POST['data_json'];

  $json = json_decode($produk, true);

  $waktu = $json['waktu'];
  $id_kasir = $json['id_kasir'];
  $total_harga = $json['total_harga'];
  $bayar = $json['bayar'];
  $kembalian = $json['kembalian'];
  $jumlah = $json['jumlah'];


  $query ="INSERT INTO pemesanan (id_pemesanan, waktu, jumlah, id_kasir, total_harga, bayar, kembalian) VALUES ('$id_pemesanan','$waktu', '$jumlah', '$id_kasir', '$total_harga', '$bayar', '$kembalian')";

  if($mysqli->query($query)) {


      foreach ($json['detail_pemesanan'] as $value) {

            $id_produk = $value['id_produk'];
            $jumlah_produk = $value['jumlah_produk'];
            $harga = $value['harga'];

            $q2 = "INSERT INTO detail_pemesanan (id_pemesanan, id_produk, jumlah_produk, harga) VALUES ('$id_pemesanan','$id_produk', '$jumlah_produk', '$harga') ";


          if($mysqli->query($q2)) {

          $response['error'] = false; 
          $response['message'] = 'Successfully'; 
          $response['id'] = $id_pemesanan; 

          }

        }

  } else {


        $response['error'] = true; 
        $response['message'] = 'Gagal'; 
        
  }

  echo json_encode($response);


// {"id_pelanggan":"3","id_alamat":"4","id_bank":"1","total_produk":"1","total_bayar":"1000000","detailproduk":[{"produk":"4","jumlah":"1"}]}
// {"id_pelanggan":"3","id_alamat":"4","id_bank":"1","total_produk":"2","total_bayar":"1000000","detailproduk":[{"produk":"4","jumlah":"2"}]}


 // {"waktu":"2018-12-04, 1:51","id_kasir":"Kasir","total_harga":"23000","bayar":"30000","kembalian":7000,"jumlah":0,"detail_pemesanan":[{"id_produk":"44000002","jumlah_produk":"2","harga":"10000"},{"id_produk":"44000004","jumlah_produk":"1","harga":"3000"}]}