<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Buku</h3>
<a class="btn" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=$_GET['ISBN'];
$det=mysqli_query(konek(),"select * from buku where ISBN ='$id_brg'")or die(mysql_error());
$d=mysqli_fetch_array($det)
?>					
	<form action="update.php" method="post" enctype="multipart/form-data">
		<!--<input type="hidden" value="<<?php echo $d['ISBN']; ?>" name="ISBN">-->
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="ISBN" value="<?php echo $d['ISBN'] ?>"></td>
			</tr>
			<tr>
				<td width="200" height="100">
					<img width="50" height="50" src="../adminweb/img/<?= $d['fileGambar'] ?>">
				</td>
			</tr>
			<tr>
				<td>ISBN</td>
				<td><input type="text" class="form-control" name="ISBN" value="<?php echo $d['ISBN'] ?>"></td>
			</tr>
			<tr>
				<td>Judul</td>
				<td><input type="text" class="form-control" name="judul" value="<?php echo $d['judul'] ?>"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" class="form-control" name="deskripsi" value="<?php echo $d['deskripsi'] ?>"></td>
			</tr>
			<tr>
				<td><label>ID_kategori</label></td>
				<td><select name="IDKategori"  class="form-control" name="IDKategori" >
							
							<option value="1" <?php if ($d['IDKategori'] == 1) echo 'selected'; ?>>1. Fisika</option>
							<option value="2" <?php if ($d['IDKategori'] == 2) echo 'selected'; ?>>2. Komputer</option>
							<option value="3" <?php if ($d['IDKategori'] == 3) echo 'selected'; ?>>3. Kalkulus</option>
							<option value="4" <?php if ($d['IDKategori'] == 4) echo 'selected'; ?>>4. Statistika</option>
							<option value="5" <?php if ($d['IDKategori'] == 5) echo 'selected'; ?>>5. Kewarganegaraan</option>
					</select></td>
			</tr>
			<tr>
				<td>poin</td>
				<td><input type="text" class="form-control" name="poin" value="<?php echo $d['poin'] ?>"></td>
			</tr>
			<tr>
				<td>File Gambar</td>
				<td><input type="file" class="form-control" name="fileGambar" value="<?php echo $d['fileGambar'] ?>"></td>
			</tr>
			<tr>
				<td>File Buku</td>
				<td><input type="text" class="form-control" name="fileBuku" value="<?php echo $d['fileBuku'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="upload" class="btn btn-info" value="Simpan perubahan"></td>
			</tr>
		</table>
	</form>
	<?php 

?>
<?php include 'footer.php'; ?>