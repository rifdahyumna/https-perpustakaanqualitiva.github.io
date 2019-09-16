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
		echo "<form class='form-horizontal' id='example_form' name='example_form' action='?modul=koleksibuku&aksi=simpan' method='POST' data-validate='parsley' enctype='multipart/form-data'>
		  	<fieldset>
			<legend>Tambah Koleksi Buku</legend>
				
				<div class='control-group'>
					<label class='control-label'>ISBN</label>
					<div class='controls'>
						<input type='text' name='ISBN' id='ISBN' class='span7' required>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>Judul Buku</label>
					<div class='controls'>
						<input type='text' name='judul' class='span7' required>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>Foto/Gambar</label>
					<div class='controls'>
						<input class='input-file' id='input-21' name='uploadimage' type='file' required>
					</div>
				</div>

				
								<div class='control-group'>
					<label class='control-label'>Nama Penulis</label>
					<div class='controls' size='5'>
						<select id='scrollable-menu' name='IDPenulis' class='form-control MULTIPLE' >";
						$penu  = mysql_query("SELECT * FROM penulis");
						while($rpenu = mysql_fetch_array($penu)){										
								echo "<option value='$rpenu[IDPenulis]'>$rpenu[namaPenulis]</option>";
							}
				  		echo "</select>
				</div>
				
								<div class='control-group'>
					<label class='control-label'>Penerbit</label>
					<select id='selectKategori' name='IDPenerbit' class='form-control'>";
						$pen  = mysql_query("SELECT * FROM penerbit");
						while($rpen = mysql_fetch_array($pen)){										
								echo "<option value='$rpen[IDPenerbit]'>$rpen[namaPenerbit]</option>";
							}
				  		echo "</select>
				</div>
				
								<div class='control-group'>
					<label class='control-label'>Kategori</label>
					<div class='controls'>
						<select id='selectKategori' name='id_kategori' class='form-control'>";
						$kat  = mysql_query("SELECT * FROM kategori_buku");
						while($rkat = mysql_fetch_array($kat)){										
								echo "<option value='$rkat[IDKategori]'>$rkat[namaKategori]</option>";
							}
				  		echo "</select>
				</div>
				
								<div class='control-group'>
					<label class='control-label'>Stok</label>
					<div class='controls'>
						<input type='text' name='stok' class='span7' data-parsley-type='digits'>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>HARGA</label>
					<div class='controls'>
						<input type='text' name='harga' class='span7' data-parsley-type='digits'> (Rp.)
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>DISKON</label>
					<div class='controls'>
						<input type='text' name='diskon' class='span7' data-parsley-type='digits'> (Rp.)
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label'>Deskripsi</label>
					<div class='controls'>

				<textarea class='input-block-level' id='summernote' name='deskripsi' rows='18'>
					</textarea>
				</div>
				</div>
				
				<input type=submit class='btn btn-primary' value='simpan'>
				<input type=reset class='btn' value='Cancel' onclick='window.history.back()'>

				
				</fieldset>";

	}

	//Ini script untuk menyimpan
	elseif($act=='simpan'){
$tanggal = 	date('Y-m-d H:i:s');
$namafolder="img/img"; 
			$ISBN=$_POST['ISBN'];
			$judul=addslashes($_POST['judul']);
			$deskirpsi=addslashes($_POST['deskripsi']);
			
			$IDPenerbit=$_POST['IDPenerbit'];
			
			
			$harga=$_POST['harga'];
	
			$IDPenulis=$_POST['IDPenulis'];
			$diskon=$_POST['diskon'];
			$stok=$_POST['stok'];
			$id_kategori=$_POST['id_kategori'];
		if (!empty($_FILES["uploadimage"]["tmp_name"])) {    
	 $jenis_gambar=$_FILES['uploadimage']['type'];    
  
	 if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")   
		 {                    
	 	$gambar = $namafolder . basename($_FILES['uploadimage']['name']);    

	  if (move_uploaded_file($_FILES['uploadimage']['tmp_name'], $gambar)) {             
echo "<h3>Data sudah berhasil tersimpan</h3><br><br>";	
		echo "<a href='?modul=koleksibuku&aksi=add'><button class='btn btn-primary'>Input Lagi</button></a> ";
		echo "<a href='?modul=koleksibuku'><button class='btn btn-warning'>Selesai</button></a>";
	  		
	               $save="insert into buku (ISBN, judul, deskripsi, IDPenerbit,tanggal, fileGambar, harga, IDPenulis, diskon ,stok,IDKategori)
				   values ('$ISBN','$judul','$deskirpsi','$IDPenerbit','$tanggal', '$gambar','$harga','$IDPenulis','$diskon','$stok','$id_kategori')";
			$res=mysql_query ($save) or die (mysql_error());



                   }

              else {            
              	echo "Gambar gagal dikirim";        
              	 }    
              	}
              	 else {         
				 echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";   
              	  }
              	 }

              	  else {     
				  echo "Anda belum memilih gambar"; 
				  } 
	

	}

	
elseif($act=='edit'){
	@$id 			 = $_POST['ISBN'];
		$sql = mysql_query("SELECT a.* FROM buku a, penulis b, penerbit c, kategori_buku d WHERE a.IDPenulis = b.IDPenulis AND a.IDPenerbit = c.IDPenerbit AND a.IDKategori = d.IDKategori AND a.ISBN = '$_GET[id]'");
		while($reb = mysql_fetch_array($sql)){
			echo "<form class='form-horizontal' action='?modul=koleksibuku&aksi=update' method='POST' enctype='multipart/form-data'>
				<input type='hidden' name='eISBN' value='$reb[ISBN]'>
		  	<fieldset>
			<legend>Tambah Koleksi Buku</legend>
				
				<div class='control-group'>
					<label class='control-label'>ISBN</label>
					<div class='controls'>
						<input type='text' value='$reb[ISBN]' name='eISBN' id='ISBN' class='span7'>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>Judul Buku</label>
					<div class='controls'>
						<input type='text' value='$reb[judul]' name='ejudul' class='span7'>
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label'>Gambar</label>
					<div class='controls'>
						<img src='../adminweb/$reb[fileGambar]' width='35%'>
					</div>
				<div class='control-group'>
					<label class='control-label'>Foto/Gambar</label>
					<div class='controls'>
						<input class='input-file' id='input-21' name='euploadimage' type='file'>
						<input type=hidden name='gambarlama' value='$reb[fileGambar]'>
					</div>
				</div>

				
								<div class='control-group'>
					<label class='control-label'>Nama Penulis</label>
					<div class='controls'>
						<select id='selectKategori' name='eIDPenulis' class='form-control'>
					
						";
						
						$penu  = mysql_query("SELECT * FROM penulis");
						
						while($rpenu = mysql_fetch_array($penu)){										
								$penID=$rpenu['IDPenulis'];
								$penjudul=$rpenu['namaPenulis'];
							if($penID==$reb[IDPenulis]){
								
								echo "<option value='$penID' selected>$penjudul</option>";
							}
							else {
								echo "<option value='$penID'>$penjudul</option>";
							}
						}
				  		echo "</select>
						
				</div>
				
								<div class='control-group'>
					<label class='control-label'>Penerbit</label>
					<select id='selectKategori' name='eIDPenerbit' class='form-control'>";
						$pen  = mysql_query("SELECT * FROM penerbit");
						while($rpen = mysql_fetch_array($pen)){										
								$penerbitID=$rpen['IDPenerbit'];
								$penerbitNama=$rpen['namaPenerbit'];
				  		if($penerbitID==$reb[IDPenerbit]){
								
								echo "<option value='$penerbitID' selected>$penerbitNama</option>";
							}
							else {
								echo "<option value='$penerbitID'>$penerbitNama</option>";
							}
						}
				  		echo "</select>
				</div>
				
								<div class='control-group'>
					<label class='control-label'>Kategori</label>
					
						<select id='selectKategori' name='eid_kategori' class='form-control'>";
						$kat  = mysql_query("SELECT * FROM kategori_buku");
						while($rkat = mysql_fetch_array($kat)){										
																$katID=$rkat['IDKategori'];
								$katNama=$rkat['namaKategori'];
				  		if($katID==$reb[IDKategori]){
								
								echo "<option value='$katID' selected>$katNama</option>";
							}
							else {
								echo "<option value='$katID'>$katNama</option>";
							}
						}
				  		echo "</select>
				</div>
				
				
								<div class='control-group'>
					<label class='control-label'>Stok</label>
					<div class='controls'>
						<input type='text' name='estok' value='$reb[stok]' class='span7'>
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>HARGA</label>
					<div class='controls'>
						<input type='text' name='eharga' value='$reb[harga]' class='span7'> (Rp.)
					</div>
				</div>
				
				<div class='control-group'>
					<label class='control-label'>DISKON</label>
					<div class='controls'>
						<input type='text' name='ediskon' class='span7'> (%.)
					</div>
				</div>
				<div class='control-group'>
					<label class='control-label'>Deskripsi</label>
					<div class='controls'>

				<textarea class='input-block-level' id='summernote' name='edeskripsi' rows='18'>
					$reb[deskripsi]</textarea>
				</div>
				</div>
				
				<input type=submit class='btn btn-primary' value='simpan'>
				<input type=reset class='btn' value='Cancel' onclick='window.history.back()'>
			</fieldset>";
		}

	}	

	//Ini script untuk update kategori
	elseif($act=='update'){
		@$id 			 = $_POST['ISBN'];
@$oldimage	  	 = $_POST['gambarlama'];
$namafolder="img/img";
$ISBN=$_POST['eISBN'];
			$judul=addslashes($_POST['ejudul']);
			$deskirpsi=addslashes($_POST['edeskripsi']);
			
			$IDPenerbit=$_POST['eIDPenerbit'];

			$harga=$_POST['eharga'];
	
			$IDPenulis=$_POST['eIDPenulis'];
			$diskon=$_POST['ediskon'];
			$stok=$_POST['estok'];
			$id_kategori=$_POST['eid_kategori'];
$tanggal = 	date('Y-m-d H:i:s');


		if (!empty($_FILES["euploadimage"]["tmp_name"])) {    
	 $jenis_gambar=$_FILES['euploadimage']['type'];    
  
unlink('../adminweb/'.$oldimage.''); 

	 if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" )   
		 {                    
	 	$gambar = $namafolder . basename($_FILES['euploadimage']['name']);    

	  if (move_uploaded_file($_FILES['euploadimage']['tmp_name'], $gambar)) {             
echo "<h3>Data sudah berhasil tersimpan</h3><br><br>";	
		echo "<a href='?modul=koleksibuku&aksi=add'><button class='btn btn-primary'>Input Lagi</button></a> ";
		echo "<a href='?modul=koleksibuku'><button class='btn btn-warning'>Selesai</button></a>";
	  	
			

	               $update="update buku set ISBN='$ISBN',judul='$judul',deskripsi='$deskirpsi',fileGambar='$gambar',IDPenerbit='$IDPenerbit',tanggal='$tanggal', harga='$harga',diskon='$diskon',stok='$stok',IDKategori='$id_kategori' where ISBN='$ISBN'"
			
			;
$res=mysql_query ($update) or die (mysql_error());

  $update="update penulis set IDPenulis='$IDPenulis'"
			
			;
$res=mysql_query ($update) or die (mysql_error());
                   }

              else {            
              	echo "Gambar gagal dikirim";        
              	 }    
              	}
              	 else {         
				 echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";   
              	  }
              	 }

              	  else{
$update="update buku set ISBN='$ISBN',judul='$judul',deskripsi='$deskirpsi',IDPenerbit='$IDPenerbit',tanggal='$tanggal', IDPenulis='$IDPenulis', harga='$harga',diskon='$diskon',stok='$stok',IDKategori='$id_kategori' where ISBN='$ISBN'"

;

		
$res=mysql_query ($update) or die (mysql_error());

				  echo "Berhasil di update. ,<br>	";	
				  echo "<a href='?modul=koleksibuku'><button class='btn btn-warning'>Selesai</button></a>";
				  
				  } 
				  
}
	



	//Ini script untuk menghapus
	elseif($act=='delete'){
		
			$d = mysql_query("SELECT fileGambar FROM buku WHERE ISBN = '$_GET[id]'");
		$rd = mysql_fetch_array($d);
		$oldimage = $rd['fileGambar'];

		//Hapus gambar lama dari komputer							
		unlink('../adminweb/'.$oldimage.'');

		mysql_query("DELETE FROM buku WHERE ISBN ='$_GET[id]'");		
		
		
	
		
		echo "<script>window.location.href='?modul=koleksibuku'</script>";
		//header('location:dashboard.php?modul=kategori');
	}


	//Ini halaman utama, jika semua modul tidak ditemukan
	else {

	echo "
	<div class='col-md-9'>
	<div class='row-fluid sortable'>						
	<div class='Utama'>
	<div class='box-header'>
		<h2><i class='icon-list'></i> DAFTAR KOLEKSI BUKU</h2>
			<button type='button' class='btn btn-primary btn-md'><a href='?modul=koleksibuku&aksi=add'><span class='glyphicon glyphicon-plus'> Tambah</span></a></button></div>
<br><br>
	<div class='box-content'>
		<table id='example' class='table table-striped table-bordered'>
		  <thead>
			  <tr>
				  <th>NO</th>

				  <th>Judul</th>
				
					
					<th>Gambar</th>
					<th>Penulis</th>
					
					<th>Harga</th>
					<th>Stok</th>

				  <th>AKSI</th>
			  </tr>
		  </thead>   
		
		  ";

		  	$b = mysql_query("SELECT a.*, b.namaPenulis FROM buku a, penulis b WHERE a.IDPenulis = b.IDPenulis ORDER BY a.judul ASC");
		  	
		  	$no=1;

		  	while($rb = mysql_fetch_array($b)){
		  		echo "<tr>";
		  		echo "<td>$no</td>";
		  		
				echo "<td>$rb[judul]</td>";
				echo "<td><img src='../adminweb/$rb[fileGambar]' style=  'vertical-align: middle;
    width: 200px;'></td>";
				echo "<td>$rb[namaPenulis]</td>";
				echo "<td>$rb[harga]</td>";
				echo "<td>$rb[stok]</td>";
		  		echo "<td>
						<a href='?modul=koleksibuku&aksi=edit&id=$rb[ISBN]' class='btn btn-default active'><i class='glyphicon glyphicon-edit'></i></a>
						<a href='?modul=koleksibuku&aksi=delete&id=$rb[ISBN]' class='btn btn-default active' onClick=\"return confirm('Apakah Anda yakin ingin Menghapus data ini ?')\"><i class='glyphicon glyphicon-trash'></i></a>";
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



$(document).on('ready', function() {
    $("#input-21").fileinput({
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: "Pick Image",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "Delete",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
        uploadClass: "btn btn-info",
        uploadLabel: "Upload",
        uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> "
    });
});




$(document).ready(function() {
	$('#summernote').summernote({
		height: 300, 
 toolbar: [
    //[groupname, [button list]]
     
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
	
  ]
		
	});
});
var postForm = function() {
	var content = $('textarea[name="deskripsi"]').html($('#summernote').code());

	};
	
	
$(document).ready(function() {
     $('#example_form').parsley();//id form
});



</script>			


</div><!--/row-->
</div>