<HTML>
	<HEAD>
		
		<!-- JQUERY -->
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		
		
		<!-- DataTables -->
			<?php
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='../../assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
  	<center><h2>Untuk mengakses modul</h2> <h1>Anda harus login</h1><br>";
  echo "<a href=../index.php><h3>LOGIN</b></h3></center>";
}
else {

?>
<script src="../assets/js/jquery-2.0.3.min.js"></script>
<?php
	@$act = $_GET['aksi'];

	//Ini script untuk input baru
	if($act=='add'){
		
		//Halaman Input Baru
		echo "<form class='form-horizontal' action='?modul=kategori&aksi=simpan' method='POST'>
		  	<fieldset>
			<legend>Input Kategori Baru</legend>
				
				<div class='control-group'>
					<label class='control-label'>Kategori</label>
					<div class='controls'>
						<input type='text' name='kategori' id='ketegori' class='span7'>
					</div>
					
				</div>
				<input type=submit class='btn btn-primary' value='Simpan'>
				<input type=reset class='btn' value='Cancel' onclick='window.history.back()'>
			</fieldset>";

	}

	//Ini script untuk menyimpan
	elseif($act=='simpan'){
		
		mysql_query($save="INSERT INTO kategori_buku SET namaKategori = '$_POST[kategori]'") or die($save.'<br>kesalahan</br>'.mysql_error()) ;

		
		echo "<h3>Data sudah berhasil tersimpan</h3><br><br>";	
		echo "<a href='?modul=kategori&aksi=add'><button class='btn btn-primary'>Input Lagi</button></a> ";
		echo "<a href='?modul=kategori'><button class='btn btn-warning'>Selesai</button></a>";	
		
	}

	//Ini script untuk update kategori
	elseif($act=='edit'){
		$eb = mysql_query("SELECT * FROM kategori_buku WHERE IDKategori = '$_GET[id]'");
		while($reb = mysql_fetch_array($eb)){
			echo "<form class='form-horizontal' action='?modul=kategori&aksi=update' method='POST'>
				<input type='hidden' name='id' value='$reb[IDKategori]''>
		  	<fieldset>
			<legend>Edit Kategori</legend>
				<div class='control-group'>
					<label class='control-label'>Kategori</label>
					<div class='controls'>
						<input type='text' value='$reb[namaKategori]' name='kategori' class='span7'>
					</div>
					
				
				<input type=submit class='btn btn-primary' value='Simpan'>
				<input type=button class='btn' value='Cancel' onclick='window.history.back()'>
			</fieldset>";
		}

	}

	//Ini script untuk update kategori
	elseif($act=='update'){

		@$id 			 = $_POST['id'];

		$update = "UPDATE kategori 
			SET namaKategori  	= '$_POST[kategori]',

			WHERE IDKategori 	= '$id'";

		mysql_query($update);
		echo "<script>window.location.href='?modul=kategori'</script>";
		//header('location:?modul=kategori');	

	}	

	//Ini script untuk menghapus
	elseif($act=='delete'){
		mysql_query("DELETE FROM kategori_buku WHERE IDkategori ='$_GET[id]'");
		
		echo "<script>window.location.href='?modul=kategori'</script>";
		//header('location:dashboard.php?modul=kategori');
	}


	//Ini halaman utama, jika semua modul tidak ditemukan
	else {

	echo "
	<div class='col-md-9'>
	<div class='row-fluid sortable'>						
	<div class='Utama'>
	<div class='box-header'>
		<h2><i class='icon-list'></i> DAFTAR KATEGORI</h2>
			<button type='button' class='btn btn-primary btn-md'><a href='?modul=kategori&aksi=add'><span class='glyphicon glyphicon-plus'> Tambah</span></a></button></div>
<br><br>
	<div class='box-content'>
		<table id='example' class='table table-striped table-bordered'>
		  <thead>
			  <tr>
				  <th>NO</th>
				  <th>KATEGORI</th>

				  <th>AKSI</th>
			  </tr>
		  </thead>   
		
		  ";

		  	$b = mysql_query($tampil="SELECT * FROM kategori_buku ORDER BY namaKategori ASC")or die($tampil.'<br>error</br>'.mysql_error());;
		  	
		  	$no=1;

		  	while($rb = mysql_fetch_array($b)){
		  		echo "<tr>";
		  		echo "<td>$no</td>";
		  		echo "<td>$rb[namaKategori]</td>";
				
		  		echo "<td>
						<a href='?modul=kategori&aksi=edit&id=$rb[IDKategori]' class='btn btn-default active'><i class='glyphicon glyphicon-edit'></i></a>
						<a href='?modul=kategori&aksi=delete&id=$rb[IDKategori]' class='btn btn-default active' onClick=\"return confirm('Apakah Anda yakin ingin Menghapus data ini ?')\"><i class='glyphicon glyphicon-trash'></i></a>";
				echo "</td>";
		  		echo "</tr>";
		  		$no++;						  		
		  	}
		  
		echo "</tbody>							
	  		</table>
			
			"
			;
	?>            
	</div>
</div><!--/span-->
<?php
}
}
?>
<script>
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>			
</div><!--/row-->
</div>