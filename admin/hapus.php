<?php 
include '../function.php';
$ISBN=$_GET['ISBN'];
mysqli_query(konek(),"delete from buku where ISBN='$ISBN'");
header("location:index.php");

?>