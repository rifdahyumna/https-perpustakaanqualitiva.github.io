<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Free HTML5 Bootstrap Admin Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->

	

	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../../assets/css/style.css" rel="stylesheet">
<script type="text/javascript" src="../js/bootstrap.js"></script>

<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>



<body style="background-color:#d9d9d9">
<?php
  include "../../function.php";
  include "../../Config/randunik.php";
  error_reporting(0);
  session_start();
  if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center><h2>Untuk mengakses modul</h2> <h1>Anda harus login</h1><br>";
  echo "<a href=index.php><h3>LOGIN</b></h3></center>";
}
else{
?>

<div class="container" style="background-color:#FFF">
		<!-- topbar starts -->
	  <div class="jumbotron" style="background-image:url(../img/206098_560754267286242_1664614814_n.jpg)" style="alignment-adjust:middle">
  <a href="#"><h1 style="color:#FFF">Toko Buku RIZKI</h1></a>      
    <p style="color:#6F3">Selamat datang pengunjung... </p>      
  </div>

<div class="nav navbar-inverse" role="navigation"> 
    <div class="container">
      <a href="#" class="navbar-brand">RIZKI</a>
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button> 
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="#">Profil</a></li>
            <li><a href="#">Hubungi Kami</a></li>
            <li><a href="#">Buku Terbaru</a></li>
           <li> 
      <input type="text" class="form-control" placeholder="Cari Buku... "><li><button class="btn btn-default" type="button" style="background-image:url(assets/images/ico-search-loop.png) inherit">Cari</button></li>
          <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Keranjang</a>
          </li></ul>
          
				
				
	<ul class="nav navbar-nav navbar-right">			
				<div class="btn-group" style= "padding-right: 18px;">
    <button type="button" class="glyphicon glyphicon-user btn btn-default dropdown-toggle" data-toggle="dropdown">
Admin
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Profil</a></li>
	  <li class="divider"></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
	</ul>
  </div>
</div>
				</div>
				
				<div class=col-md-11 style="
padding-left: 85px;">
<div class="headingdetail"><h4> Detail Transaksi : </h4></div>
<div class="row"> Detail ...
</div><br><br/>

<?php

 $sel_member = "select member.*,OrderData.*,provinsi.provinsiNama,kabupaten.kabupatenNama,kabupaten.Onkoskirim from member,OrderData,provinsi,kabupaten where provinsi.provinsiId=member.provinsiId AND kabupaten.kabupatenId=member.kabupatenId AND  orderdata.id_member=member.id_member AND member.StatusOrder='order' AND orderdata.IDOrder='".$_POST['txtIDOrder']."'";
$cek_sel_member = mysql_query($sel_member) or die (mysql_error());
 $hsl_plg= mysql_fetch_array($cek_sel_member);


?>

<ul style="list-style:disc">
	<li> No Transaksi &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; <b> &nbsp; : <?php echo $hsl_plg['IDOrder']?></b> <input name="TxtIdmember" type="hidden" value="<?php echo $hsl_plg['id_member'] ?>" >  </li>

	<li> Id Member &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; <b> &nbsp; : <?php echo $hsl_plg['id_member']?></b> <input name="TxtIdmember" type="hidden" value="<?php echo $hsl_plg['id_member'] ?>" >  </li>
    <li>Nama &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; <b>: &nbsp; <?php echo $hsl_plg['Namalengkap']?></b> </li>
    <li>Provinsi &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp;<b>: <?php echo $hsl_plg['provinsiNama']?></b></li>
    <li>Alamat Rinci  &nbsp; &nbsp; <b>: <?php echo $hsl_plg['alamat']?></b></li>
    
    <li>No Telp   &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;<b>:<?php echo $hsl_plg['no_telp']?></b></li>
  </ul>


<table class="table" id="tabel">
 <tbody class id="backgroundtabel">
  
			  <tr class id="kepalatabel">
			  <th>No</th>
				  <th>Nama Barang</th>
				  <th>Penulis</th>
				 <th>Penerbit</th>

				  <th>Jumlah</th>
				
					
					<th>Harga@</th>
					<th>Subtotal</th>
					
				
					
			  </tr>
			<?php
			

$harga = "select bk.*,pl.namaPenulis,pn.namaPenerbit,dt.JumlahBeli from buku bk, penulis pl, penerbit pn, detailorder dt where pl.IDPenulis=bk.IDPenulis AND pn.IDPenerbit=bk.IDPenerbit AND bk.ISBN=dt.ISBN AND dt.IDOrder='".$_POST['txtIDOrder']."' ORDER BY bk.ISBN";
$runharga = mysql_query($harga) or die (mysql_error());
while($sql=mysql_fetch_array($runharga)){
	$ISBN = $sql['ISBN'];
	$hargabuku = "select * from buku where ISBN='$ISBN'";
	$runhargabuku= mysql_query($hargabuku);
	while($hsql=mysql_fetch_array($runhargabuku)){
		$hargatotal = array($hsql['harga']);
		$ID = $sql['ISBN'];
		$judul = $hsql['judul'];
		$gambar = $hsql['fileGambar'];
		$jumlah = $sql['JumlahBeli'];
		$diskon = $hsql['diskon'];
		$penulis = $sql['namaPenulis'];
		$penerbit = $sql['namaPenerbit'];
	$angka = $hsql['harga'];
	
	if($hsql['stok']>0)
      $infostok="Tersedia";
    else
      $infostok="HABIS";
			$diskon2 = $angka - (($angka*$diskon)/100);
			$hasil2 = number_format($diskon2,0,',','.');
			$subtotal = $diskon2*$jumlah;
$hasil = number_format($subtotal,0,',','.');

$values = array_sum($hargatotal);
$total =$total + $subtotal;
$total2 = number_format($total,0,',','.');
 $ongkos = $hsl_plg['Onkoskirim'];
$totalakhir =  $ongkos + $total;
$totalakhir2 = number_format($total,0,',','.');
$uniktrans = RandUnik('3');
$no = 1;
$nomer +=$no;
	?>
			  <tr> 
		<td><?php echo $nomer;?></td> 
				<td><div class="col-md-3"> <img src="../../adminweb/<?php echo $gambar?>" class="img-thumbnail-detail" alt="Cinque Terre" width="304" height="236"></div><div class="col-md-7">&nbsp <?php echo $judul;?> <br><br>&nbsp Stok: <?php echo $infostok?></div></td> 
<td><?php echo $penulis;?><br></td> 
<td><?php echo $penerbit;?><br></td> 
				<td><?php echo $jumlah;?><br></td> 
	
				<td>Rp. <?php echo $hasil2; ?> (diskon <?php echo $diskon;?> %)</td>
<td>Rp. <?php echo $hasil;?></td>
					
		 </tr>
			
<?php	
	}
	}
}
?>
		 </tbody>
		 
</table>

<form name="IDOrder" method="POST" action="lunas.php?p=lunas&idorder=<?php echo $hsl_plg['IDOrder'] ?>" enctype="multipart/form-data">

<div class="row" style="text-align: right">TOTAL : Rp. <?php echo $total2;?></div>
<div class="row" style="text-align: right">Ongkos Kirim : <?php echo $ongkos?> /kg</div>
<div class="row" style="text-align: right">Total Ongkos Kirim : <?php echo "-" ?></div>
<div class="row" style="text-align: right">kode transaksi : <input name="TxtUnik" type="hidden" value="<?php echo $uniktrans; ?>" > <?php echo $uniktrans; ?></div>
<div class="row" style="text-align: right">Total yang Anda harus bayar : <?php echo $totalakhir2;?></div><br>
<br>
<div class="row" style="text-align: center;">
<input name="txtIDOrder" type="hidden" value="<?php echo $hsl_plg['IDOrder']?>">
Ubah Status Menjadi Lunas : <br>

<button type="submit" class="btn btn-success">LUNAS</button>
</form>
</div>
</div>


</div>
</div>
</div>

</body>
</html>
