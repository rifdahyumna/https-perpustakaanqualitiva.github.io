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
		echo "<form class='form-horizontal' action='?modul=penerbit&aksi=simpan' method='POST'>
		  	<fieldset>
			<div class='form-group'>
      <label for='usr'>Name:	</label>
      <input type='text' class='form-control' id='nama' name='nama'>
    </div> <br>
    <div class='form-group'>
      <label for='alamat'>Alamat:	</label>
      <input type='text' class='form-control' id='alamat' name='alamat'>
    </div><br>
	<div class='form-group'>
      <label for='Email'>Email:	</label>
      <input type='text' class='form-control' id='email' name='email'>
    </div> <br>
	<div class='form-group'>
      <label for='website'>website:	</label>
      <input type='text' class='form-control' id='website' name='website'>
    </div> <br>
	<div class='form-group'>
      <label for='website'>telp:	</label>
      <input type='text' class='form-control' id='tlp' name='tlp'>
    </div> <br>
			</fieldset>";

	}

	//Ini script untuk menyimpan
	elseif($act=='simpan'){
		
		mysql_query($save="INSERT INTO penerbit SET 
	 namaPenerbit = '$_POST[nama]',
	 alamatPenerbit = '$_POST[alamat]',
	 Email = '$_POST[email]',
	 Website = '$_POST[website]',
	 Notelp = '$_POST[tlp]'") or die($simpan.'<br>error</br>'.mysql_error());

		
		echo "<h3>Data sudah berhasil tersimpan</h3><br><br>";	
		echo "<a href='?modul=penerbit&aksi=add'><button class='btn btn-primary'>Input Lagi</button></a> ";
		echo "<a href='?modul=penerbit'><button class='btn btn-warning'>Selesai</button></a>";	
		
	}

	//Ini script untuk update penerbit
	elseif($act=='edit'){
		$eb = mysql_query("SELECT * FROM penerbit WHERE IDPenerbit = '$_GET[id]'");
		while($reb = mysql_fetch_array($eb)){
			echo "<form class='form-horizontal' action='?modul=penerbit&aksi=update' method='POST'>
				<input type='hidden' name='id' value='$reb[IDPenerbit]''>
		  	<fieldset>
			<legend>Edit penerbit</legend>
				<div class='form-group'>
      <label for='usr'>Name:	</label>
      <input type='text' value='$reb[namaPenerbit]' class='form-control' id='nama' name='nama'>
    </div> <br>
    <div class='form-group'>
      <label for='alamat'>Alamat:	</label>
      <input type='text' value='$reb[alamatPenerbit]' class='form-control' id='alamat' name='alamat'>
    </div><br>
	<div class='form-group'>
      <label for='Email'>Email:	</label>
      <input type='text' value='$reb[Email]' class='form-control' id='email' name='email'>
    </div> <br>
	<div class='form-group'>
      <label for='website'>website:	</label>
      <input type='text' value='$reb[Website]' class='form-control' id='website' name='website'>
    </div> <br>
	<div class='form-group'>
      <label for='website'>telp:	</label>
      <input type='text' value='$reb[Notelp]' class='form-control' id='tlp' name='tlp'>
    </div> <br>
					
				
				<input type=submit class='btn btn-primary' value='Simpan'>
				<input type=button class='btn' value='Cancel' onclick='window.history.back()'>
			</fieldset>";
		}

	}

	//Ini script untuk update penerbit
	elseif($act=='update'){

		@$id 			 = $_POST['id'];

		$update = "UPDATE penerbit 
			SET namaPenerbit  	= '$_POST[nama]',
			alamatPenerbit  	= '$_POST[alamat]',
			Email  	= '$_POST[email]',
			Website  	= '$_POST[Website]',
			WHERE IDPenerbit 	= '$id'";

		mysql_query($update);
		echo "<script>window.location.href='?modul=penerbit'</script>";
		//header('location:?modul=penerbit');	

	}	

	//Ini script untuk menghapus
	elseif($act=='delete'){
		mysql_query("DELETE FROM penerbit WHERE IDPenerbit ='$_GET[id]'");
		
		echo "<script>window.location.href='?modul=penerbit'</script>";
		//header('location:dashboard.php?modul=penerbit');
	}


	//Ini halaman utama, jika semua modul tidak ditemukan
	else {

	echo "
	<div class='col-md-9'>
	<div class='row-fluid sortable'>						
	<div class='Utama'>
	<div class='box-header'>
		<h2><i class='icon-list'></i> DAFTAR penerbit</h2>
			<button type='button' class='btn btn-primary btn-md'><a href='?modul=penerbit&aksi=add'><span class='glyphicon glyphicon-plus'> Tambah</span></a></button></div>
<br><br>
	<div class='box-content'>
		<table id='example' class='table table-striped table-bordered'>
		  <thead>
			  <tr>
				  <th>NO</th>
				  <th>Nama Penerbit</th>

				  <th>Alamat Penerbit</th>
				  <th>Email</th>
				  <th>Website</th>
				  <th>Aksi</th>
				  
			  </tr>
		  </thead>   
		
		  ";

		  	$b = mysql_query($tampil="SELECT * FROM penerbit ORDER BY namaPenerbit ASC")or die($tampil.'<br>error</br>'.mysql_error());;
		  	
		  	$no=1;

		  	while($rb = mysql_fetch_array($b)){
		  		echo "<tr>";
		  		echo "<td>$no</td>";
		  		echo "<td>$rb[namaPenerbit]</td>";
				echo "<td>$rb[alamatPenerbit]</td>";
				echo "<td>$rb[Email]</td>";
				echo "<td>$rb[Website]</td>";
		  		echo "<td>
						<a href='?modul=penerbit&aksi=edit&id=$rb[IDPenerbit]' class='btn btn-default active'><i class='glyphicon glyphicon-edit'></i></a>
						<a href='?modul=penerbit&aksi=delete&id=$rb[IDPenerbit]' class='btn btn-default active' onClick=\"return confirm('Apakah Anda yakin ingin Menghapus data ini ?')\"><i class='glyphicon glyphicon-trash'></i></a>";
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