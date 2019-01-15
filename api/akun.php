<?php 

require_once '../setting/koneksi.php';
require_once '../setting/crud.php';

 $response = array();
 
    if(isTheseParametersAvailable(array('email', 'password'))){


    $email=$_POST['email'];
    $password=$_POST['password']; 

    $sqlmitra ="SELECT id_mitra, nama_mitra, email, password FROM mitra WHERE email='$email' AND password='$password'";
    
    $sqladmin ="SELECT id_admin, nama_admin, email, password, status FROM admin WHERE email='$email' AND password='$password'";

    $sqlkasir ="SELECT id_kasir, id_mitra, email, password, handphone, alamat FROM alamat WHERE email='$email' AND password='$password'";


        if (CekExist($mysqli,$sqlkasir)== true){

		    $email=$_POST['email'];
		    $password=$_POST['password']; 

	         $stmt= $mysqli->prepare("SELECT id_kasir, id_mitra, email, password, handphone, alamat FROM alamat WHERE email= ? AND password= ?");

	         $stmt->bind_param("ss",$email, $password);

	         $stmt->execute();
	     
	         $stmt->store_result();
	         
	         if($stmt->num_rows > 0){
	         
	         $stmt->bind_result($email, $password, $handphone);
	         $stmt->fetch();
	         
	         $user = array(
	         'email'=>$email, 
	         'password'=>$password, 
	         'handphone'=>$handphone,
	         'user' => "Kasir"
	         );

	         $response['error'] = false; 
	         $response['message'] = 'Login successfull';
	         $response['user'] = $user;  

	         } 


         } else if (CekExist($mysqli,$sqlmitra)== true){

		    $email=$_POST['email'];
		    $password=$_POST['password']; 

	         $stmt= $mysqli->prepare("SELECT nama_mitra, email, password FROM mitra WHERE email= ? AND password= ?");

	         $stmt->bind_param("ss",$email, $password);

	         $stmt->execute();
	     
	         $stmt->store_result();
	         
	         if($stmt->num_rows > 0){
	         
	         $stmt->bind_result($nama_mitra, $email, $password);
	         $stmt->fetch();
	         
	         $user = array(
	         'nama_mitra'=>$nama_mitra, 
 	         'email'=>$email,
	         'password'=>$password, 
	         'user' => "Mitra"
	         );

	         $response['error'] = false; 
	         $response['message'] = 'Login successfull';
	         $response['user'] = $user;  

	         } 

		} else if (CekExist($mysqli,$sqladmin)== true){

		    $email=$_POST['email'];
		    $password=$_POST['password']; 

	         $stmt= $mysqli->prepare("SELECT nama_admin, email, password, status FROM mitra WHERE email= ? AND password= ?");

	         $stmt->bind_param("ss",$email, $password);

	         $stmt->execute();
	     
	         $stmt->store_result();
	         
	         if($stmt->num_rows > 0){
	         
	         $stmt->bind_result($nama_admin, $email, $password, $status);
	         $stmt->fetch();
	         
	         $user = array(
	         'nama_admin'=>$nama_mitra, 
 	         'email'=>$email,
	         'password'=>$password, 
	         'status'=>$status, 
	         'user' => "Admin"
	         );

	         $response['error'] = false; 
	         $response['message'] = 'Login successfull';
	         $response['user'] = $user;  

	         } 


         } else {

           $response['error'] = false; 
           $response['message'] = 'Invalid username or password';


           echo "Invalid username or password";

         }
       }


   echo json_encode($response);
 
   function isTheseParametersAvailable($params){
   
   foreach($params as $param){
   if(!isset($_POST[$param])){
   return false; 
   }
   }
   return true; 
   }