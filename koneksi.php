<<<<<<< HEAD
<?php

$host="localhost";
$user="root";
$password="";
$db="crud";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
=======
<?php

$host="localhost";
$user="root";
$password="";
$db="db_rs";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
>>>>>>> 7d64e17024159e7dd470d77894d1db1f8cbff318
?>