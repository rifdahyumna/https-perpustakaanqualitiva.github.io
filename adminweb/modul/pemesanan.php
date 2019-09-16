<HTML>
	<HEAD>
		
		<!-- JQUERY -->
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		
		
		<!-- DataTables -->
			<?php
			
			
			
 include "../function.php";
 include "../Config/randunik.php";
 
 
  if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='../../assets/css/bootstrap.css' rel='stylesheet' type='text/css'>
  	<center><h2>Untuk mengakses modul</h2> <h1>Anda harus login</h1><br>";
  echo "<a href=../index.php><h3>LOGIN</b></h3></center>";
}
else {

?>

	<div class="col-md-9">
	<div class="row-fluid sortable">						
	<div class="Utama">
	<div class="box-header">
		<h2><i class="icon-list"></i> Daftar Order</h2>
	<div class="box-content">
	<form name="IDOrder" method="POST" action="modul/detailpesan.php" enctype="multipart/form-data">
		<table id="example" class="table table-striped table-bordered">
		  <thead>
			  <tr>
				  <th>NO</th>
				  <th>NO TRANSAKSI</th>
<th>NAMA PEMESAN</th>
				  <th>TANGGAL PESAN</th>
				  <th>STATUS</th>
				  <th>KODE UNIK</th>
				  <th>DETAIL</th>
			  </tr>
		  </thead>   
			  <?php

		  	$b = mysql_query($tampil="SELECT orderdata.*,member.* FROM orderdata, member where member.id_member=orderdata.id_member AND member.StatusOrder = 'Order' ORDER BY username ASC")or die($tampil.'<br>error</br>'.mysql_error());;
		  	
		  	$no=1;

		  	while($rb = mysql_fetch_array($b)){ ?>
				
		  		<tr>
		  		<td><?php echo $no ?></td>
		  		<td><?php echo $rb['IDOrder'] ?><input name="txtIDOrder" type="hidden" value="<?php echo $rb['IDOrder'] ?>"></td>
				<td><?php echo $rb['Namalengkap'] ?></td>
				<td><?php echo $rb['TanggalOrder'] ?></td>
				<td><?php echo $rb['StatusOrder'] ?></td>
				
		  		<td>
				<?php	echo $rb['unik_transfer'] ?></td>
				<td align="center"><input name="TbDetail" type="submit" value="Tampil"></td>
		  		</tr><?php
		  		$no++;						  		
		  	} ?>
		  
		</tbody>							
	  		</table>
			</form>
			
<?php			
}
?>

<script>
$(document).ready(function() {
    $('#example').dataTable();
} );
</script>