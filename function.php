<?php
include_once("Config/config_db.php");

function konek()
{
	return $konek= mysqli_connect("localhost","root","","library");
}
function anti_injek($var)
{
	return mysqli_escape_string(konek(),strip_tags(trim($var)));
}
function rdr($txt,$tujuan)
{
	echo"<script> alert('$txt');
	window.location='$tujuan';</script>'";
}
function rdrN($txt, $tujuan)
{
	echo"<script> alert('$txt');
	window.open='$tujuan';</script>'";
}
function cek_sesi()
{
	if(empty($_SESSION['sesUSER']))
	{
		rdr('session time out','index.php');
		return false;
	}
	return true;
}
function kdauto($tabel, $inisial){
	$struktur	= mysqli_query($GLOBALS['connect'],"SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);

 	$qry	= mysqli_query($GLOBALS['connect'],"SELECT max(".$field.") FROM ".$tabel);
 	$row	= mysqli_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
	
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}
function total(){
	$nama = $_SESSION['sesUSER'];
	$sql = mysqli_query($GLOBALS['connect'],"SELECT point FROM user where username='$nama'");
	$rsql = mysqli_fetch_array($sql);
	echo $rsql['point'];
	/*if(isset($_GET['poinq'])){
		
		$ip = getIp();
		
		$jumlahpoin = mysqli_query($GLOBALS['connect'],"select * from poin where ip_add='$ip'");
		$runbuku =  mysqli_num_rows($jumlahpoin);
	}
		else {
			
		$ip = getIp();
		
		$jumlahpoin = mysqli_query($GLOBALS['connect'],"select * from poin where ip_add='$ip'");
		$runbuku =  mysqli_num_rows($jumlahpoin);
			
		}
		
		echo $runbuku;
		*/
	}



function kat(){

	$kat = mysqli_query($GLOBALS['connect'],"SELECT * FROM kategori_buku ORDER By namaKategori ASC ");
	while($rkat = mysqli_fetch_array($kat)){
		$IDKategori = $rkat['IDKategori'];
		echo "<a href='kategori.php?IDKategori=$IDKategori' class='list-group-item'>$rkat[namaKategori]</a>";
		
	}
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];




  
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}



function Bukurekomen(){
	
	$Bukurekomen = mysqli_query($GLOBALS['connect'],"select * from buku order by RAND() LIMIT 0,5"); 
	while($rbuku = mysqli_fetch_array($Bukurekomen)){
		
	$ISBN = $rbuku['ISBN'];		
	$angka = $rbuku['poin'];
	$hasil = number_format($angka,0,',','.');
			
		echo "
		 <div class='col-sm-6 col-md-3'>
    <div class='thumbnail' id='thumbnail'>
      <img src='adminweb/img/$rbuku[fileGambar]' class='img' alt='...'>
      <div class='caption'>
        <a href='detil.php?ISBN=$ISBN'><h4>$rbuku[judul]</h4></a>
          Poin : $hasil
        </p>
        <p><a href='downloadnew.php?ISBN=$ISBN' class='btn btn-default' role='button'>Baca dan Unduh</a></p>
       
      </div>
    </div>
  </div>
		
		";
		
	}
	
}


function terkait(){
if(isset($_GET['IDKategori'])){
$IDKategori = $_GET['IDKategori'];	
	
	
	


$sql =mysqli_query($GLOBALS['connect'],"SELECT a.*, c.namaKategori FROM buku a, kategori_buku c WHERE a.IDKategori=c.IDKategori AND c.IDKategori = '$IDKategori' order by RAND() LIMIT 0,12") 

or die($sql.'<br>error</br>'.mysqli_error());
while($rsql=mysqli_fetch_array($sql)){
	
	$ISBN = $rsql['ISBN'];		
	$angka = $rsql['poin'];
	$hasil = number_format($angka,0,',','.');
			
		echo "
		 <div class='col-sm-6 col-md-3'>
    <div class='thumbnail' id='thumbnail'>
      <img src='adminweb/img/$rsql[fileGambar]' class='img' alt='...'>
      <div class='caption'>
        <a href='detil.php?ISBN=$ISBN'><h4>$rsql[judul]</h4></a>
          Poin : $hasil 
        </p>
        <p><a href='downloadnew.php?ISBN=$ISBN' class='btn btn-default' role='button'>Baca dan Unduh</a></p>
      </div>
    </div>
  </div>
		
		";
		
	}
	
}

	
}


function cari(){
if(isset($_GET['cari'])){
$judul = $_GET['cari'];	


$sql = mysqli_query($GLOBALS['connect'],"SELECT * FROM buku WHERE judul like '%$judul%'")

or die($sql.'<br>error</br>'.mysqli_error());
var_dump($sql);
while($rsql=mysqli_fetch_array($sql)){
	
	$ISBN = $rsql['ISBN'];		
	$angka = $rsql['poin'];
	$hasil = number_format($angka,0,',','.');
			
		echo "
		 <div class='col-sm-6 col-md-3'>
		    <div class='thumbnail' id='thumbnail'>
		      <img src='adminweb/img/$rsql[fileGambar]' class='img' alt='...'>
		      <div class='caption'>
		        <a href='detil.php?ISBN=$ISBN'><h4>$rsql[judul]</h4></a>
		          Poin : $hasil 
		        </p>
		        <p><a href='downloadnew.php?ISBN=$ISBN' class='btn btn-default' role='button'>Baca dan Unduh</a></p>
		      </div>
		    </div>
		  </div>
		";
		}
	}	
}
?>