<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'DatabaseConfig.php';

 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

 $Email = $_POST['Email'];
 
 $Password = $_POST['Password'];

 $KonfirmasiPassword = $_POST['Konfirmasi Password'];

 $Notelpon = $_POST['No Telpon'];
 
 $Nama = $_POST['Nama'];

 $CheckSQL = "SELECT * FROM reseller WHERE Email='$Email'";
 
 $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));
 
 if(isset($check)){

 echo 'Email Already Exist, Please Enter Another Email.';

 }
else{ 
$Sql_Query = "INSERT INTO reseller (Email,Password,Konfirmasi Password,No Telpon,Nama) values ('$Email','$Password','$KonfirmasiPassword','$Notelpon','$Nama')";

 if(mysqli_query($con,$Sql_Query))
{
 echo 'User Registration Successfully';
}
else
{
 echo 'Something went wrong';
 }
 }
}
 mysqli_close($con);
?>