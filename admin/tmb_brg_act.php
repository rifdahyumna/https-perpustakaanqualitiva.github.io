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
	$nama = $_FILES['fileGambar']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['fileGambar']['size'];
	$file_tmp = $_FILES['../../adminweb/img/']['tmp_name'];	
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, '../../adminweb/img/'.$nama);
			$sql = "INSERT INTO buku (`ISBN`, `judul`, `deskripsi`, `IDKategori`, `poin`, `fileGambar`, `fileBuku`) VALUES ('$ISBN', '$judul', '$deskripsi',  '$IDKategori', '$poin', '$nama', '$fileBuku')";
			//$q = "insert into buku (ISBN, judul, deskripsi, IDPenerbit, poin, IDPenulis, nama) values ()";
			$query = mysqli_query(konek(),$sql);
		    }
		    else{
				echo 'UKURAN FILE TERLALU BESAR'; 
		    }
       	}else{
			echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'; 
	    }
    }
    
header("location:index.php");
?>

// $tmp= konek();
// mysqli_query($tmp,"insert into values '$ISBN','$Judul','$Deskripsi','$ID_Penerbit','$Poin','$ID_Penulis','$ID_Kategori','$fileGambar'") or die(mysqli_error($tmp));
 ?>