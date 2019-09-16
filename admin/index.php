<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Buku</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Buku</button>
<br/>
<br/>

<?php 
$per_hal=10;
$jumlah_record=mysqli_query(konek(),"SELECT * from buku");
$jum=mysqli_num_rows($jumlah_record);
//print_r(mysqli_num_rows($jumlah_record));
$halaman=ceil($jum/$per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr> 
	</table>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari buku di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">ISBN</th>
		<th class="col-md-1">Judul</th>
		<th class="col-md-0">Deskripsi</th>
		<th class="col-md-1">ID Kategori</th>
		<th class="col-md-1">Poin</th>
		<th class="col-md-1">File Gambar</th>
		<th class="col-md-1">File Buku</th>
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=$_GET['cari'];
		$brg=mysqli_query(konek(),"select * from buku where ISBN like '%".$cari."%' or judul like '%".$cari."%' or deskripsi like '%".$cari."%' or IDKategori like '%".$cari."%' or poin like '%".$cari."%' or fileGambar like '%".$cari."%' or fileBuku like '%".$cari."%'");
	}else{
		$brg=mysqli_query(konek(),"select * from buku limit $start, $per_hal");
	}
	$no=1;
	while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['ISBN'] ?></td>
			<td><?php echo $b['judul'] ?></td>
			<td><?php echo $b['deskripsi'] ?></td>
			<td><?php echo $b['IDKategori'] ?></td>
			<td><?php echo $b['poin'] ?></td>
			<td><?php echo $b['fileGambar'] ?></td>
			<td><?php echo $b['fileBuku'] ?></td>
			<td>
				<a href="edit.php?ISBN=<?php echo $b['ISBN']; ?>" class="btn btn-primary">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus.php?ISBN=<?php echo $b['ISBN']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>

			<?php  
	}
	?>
	<tr>
		<td colspan="4"></td>
		
	</tr>
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
		
<!-- modal input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Buku Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>ISBN</label>
						<input name="ISBN" type="text" class="form-control" placeholder="ISBN ..">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input name="judul" type="text" class="form-control" placeholder="Judul Buku ..">
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input name="deskripsi" type="text" class="form-control" placeholder="Deskripsi Buku ..">
					</div>		
					<label>ID_kategori</label>
						<select name="IDKategori"  class="form-control">
							<option value="1">1. Fisika</option>
							<option value="2">2. Komputer</option>
							<option value="3">3. Kalkulus</option>
							<option value="4">4. Statistika</option>
							<option value="5">5. Kewarganegaraan</option>
						</select>
					<div class="form-group">
						<label>Poin</label>
						<input name="poin" type="text" class="form-control" placeholder="Poin per buku">
					</div>
					<div class="form-group">
						<label>File Gambar</label>
						<input name="fileGambar" type="file" class="form-control">
					</div>
					<div class="form-group">
						<label>File Buku</label>
						<input name="fileBuku" type="text" class="form-control" placeholder="masukan file buku">
					</div>
					<div class="modal-footer">
					<button type="Reset" class="btn btn-default" >Reset</button>
					<input type="submit" name="upload" class="btn btn-primary" value="Simpan">
					<!--
					<button type="submit" class="btn btn-default" data-dismiss="modal">Simpan</button>
					-->
					
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>