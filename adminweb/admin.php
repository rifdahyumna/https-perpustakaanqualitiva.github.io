<!DOCTYPE html>
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
	<title>Halaman Admin</title>
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
	<link href="css/bootstrap.css" rel="stylesheet">
	
<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>



<body style="background-color:#d9d9d9">
<?php
  include "../Config/config_db.php";
  
  session_start();
  if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center><h2>Untuk mengakses modul</h2> <h1>Anda harus login</h1><br>";
  echo "<a href=index.php><h3>LOGIN</b></h3></center>";
}
else{
?>

<div class="container" style="background-color:#FFF">
		<!-- topbar starts -->
	  <div class="jumbotron" style="background-image:url(img/206098_560754267286242_1664614814_n.jpg)" style="alignment-adjust:middle">
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
         </ul>
          
				
				
	<ul class="nav navbar-nav navbar-right">			
				<div class="btn-group" style= "padding-right: 18px;">
    <button type="button" class="glyphicon glyphicon-user btn btn-default dropdown-toggle" data-toggle="dropdown">
Admin
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Profil</a></li>
	  <li class="divider"></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
	</ul>
  </div>
</div>
				</div>
				
				<!-- user dropdown ends -->
				
				
		

	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="col-sm-3 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="?modul=home"><i class="icon-home"></i>
						<span class="hidden-tablet">Dashboard</span></a></li>
						<li><a class="ajax-link" href="?modul=koleksibuku"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Koleksi Buku</span></a></li>
						
						<li><a class="ajax-link" href="?modul=kategori"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Kategori Buku</span></a></li>
						<li><a class="ajax-link" href="?modul=penulis"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Penulis</span></a></li>
						<li><a class="ajax-link" href="?modul=penerbit"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Penerbit</span></a></li>
						<li><a class="ajax-link" href="?modul=Pemesanan"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Pemesanan</span></a></li>
						<li><a class="ajax-link" href="?modul=lunas"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Pembayaran Lunas</span></a></li>
                        <li><a class="ajax-link" href="?modul=member"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Lihat Semua Member</span></a></li>
                        <li><a class="ajax-link" href="?modul=logout"><i class="icon-list-alt"></i>
						<span class="hidden-tablet">Logout</span></a></li>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
		
			
			
			<!-- content starts -->
<div id="col-sm-9" ><div>
        <ul class="breadcrumb" class='nav nav-pills nav-stacked'>
          <li>
            <a href="admin.php?modul=home"><h3>DASHBOARD</h3></a>
          </li>
        </ul>
        <div>
          <?php
            $m = $_GET['modul'];
            
            //Ini ditampilkan pertama kali ketika berhasil Login
            if($m=='home')
            {
              echo "SELAMAT DATANG <b>$_SESSION[fullname] </b>";
              echo "<br><br>";
              echo "<p>Silakan memilih salah satu menu yang ada di sebeleh kiri untuk mengelola</p>";
            }

            //Ini untuk memanggil modul berita
            elseif($m=='kategori'){
              include "modul/kategori.php";
            }
			
			elseif($m=='koleksibuku'){
              include "modul/koleksibuku.php";
            }

            //Ini untuk memanggil modul kategori
            elseif($m=='penulis'){
             include "modul/penulis.php";
            }

            //Ini untuk memanggil modul subkategori
            elseif($m=='penerbit'){
              include "modul/penerbit.php";
            }
            
            elseif($m=='Pemesanan'){
              include "modul/pemesanan.php";
            }
			
			 elseif($m=='lunas'){
              include "modul/pembayaranlunas.php";
            }
			
			elseif($m=='member'){
              include "modul/member.php";
            }
            elseif($m=='logout'){
              include "logout.php";
            }

            else{
              echo "Halaman yang dicari tidak ditemukan";
            }

          ?> 
        </div>

      </div>    

		  
       
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://irfanmuhluster.blogspot.com" target="_blank">Muhammad Irfan</a> 2015</p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template"Usman IT</a></p>
		</footer>
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	
        <link rel="stylesheet" type="text/css" href="css/style.css">
		 <link rel="stylesheet" type="text/css" href="css/fileinput.css">
		 
		 <link rel="stylesheet" type="text/css" href="css/summernote.css">
		  <link rel="stylesheet" type="text/css" href="css/fileinput.min.css">

				  		  <link rel="stylesheet" type="text/css" href="css/summernote-bs3.css">
		
				  		  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" language="javascript" src="js/parsley.js"></script>
		<script type="text/javascript" language="javascript" src="js/parsley.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/id.js"></script>
		<script type="text/javascript">
  window.Parsley.setLocale('id');
</script>
		<script type="text/javascript" language="javascript" src="js/fileinput.js"></script>
		<script type="text/javascript" language="javascript" src="js/fileinput.min.js"></script>
<script type="text/javascript" language="javascript" src="js/summernote.js"></script>
<script type="text/javascript" language="javascript" src="js/summernote.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
				       <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.responsive.css">
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.responsive.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/common.js"></script>
	</div>	
		</div>
		<?php
}
		?>
</body>
</html>
