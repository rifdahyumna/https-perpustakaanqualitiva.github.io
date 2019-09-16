<?php 
include '../function.php';
$ISBN=$_POST['ISBN'];
$judul=$_POST['judul'];
$deskripsi=$_POST['deskripsi'];
$IDKategori=$_POST['IDKategori'];
$poin=$_POST['poin'];
$fileGambar=$_POST['fileGambar'];
$fileBuku=$_POST['fileBuku'];


if($_POST['upload']){
	
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['../../adminweb/img/']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../../adminweb/img/'.$nama);
			$sql = "UPDATE buku SET ISBN='$ISBN', judul='$judul', deskripsi='$deskripsi', IDKategori='$IDKategori', poin='$poin', fileGambar='$nama', fileBuku='$fileBuku' where ISBN='$ISBN'";
			
			$query = mysqli_query(konek(),$sql);
			
				if($query){
					echo 'FILE BERHASIL DI UPLOAD'; 
				}else{
					echo $sql;
					echo 'GAGAL MENGUPLOAD GAMBAR'; 
				}
		    }else{
				echo 'UKURAN FILE TERLALU BESAR'; 
		    }
       	}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'; 
	    }
    }
    
header("location:index.php");


 ?>

