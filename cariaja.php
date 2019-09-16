<!DOCTYPE html>
<html lang="en">
<?php

include "function.php";
session_start();


?>
<head>
  <title>Library Web Qualitiva.id</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-opensans.css" rel="stylesheet" type="text/css" media="screen" > 
<link href="assets/css/MTVM.css" rel="stylesheet" type="text/css">
<link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">




<script type="text/javascript" src="assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>

  <!-- Start css3menu.com HEAD section -->

  

  <!-- End css3menu.com HEAD section -->


<link rel="stylesheet" href="assets/css/MTVM1.css" type="text/css">
  <!-- Start css3menu.com HEAD section -->

  <link rel="stylesheet" href="Index_files/css3menu0/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>

  <!-- End css3menu.com HEAD section -->

</head>
<body style="background-color:#C71585">

<div  style="background-color:#C71585 " class="nav navbar-inverse" role="navigation"> 
    <div class="container">
      <a href="dashboard_siswa.php" class="navbar-brand"><p style="color: white"><b>Qualitiva.id</b></p></a>
          <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button> 
        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="https://www.facebook.com/qualitiva/?rc=p"><p style="color: white"><b>Hubungi Kami</b></p></a></li>
           <li> 
      <form action="cari_p.php" method="get" id="form_cari"></form> 
        <input type="text" class="form-control" name="cari" placeholder="Cari Buku... " form="form_cari"><li><button class="btn btn-default" type="submit" style="background-color: yellow"  style="background-image:url(assets/images/ico-search-loop.png) inherit" form="form_cari">Cari</button></a></li> 
          <li><a href="#"><span class="glyphicon"></span> <b style="color: white"> Poin Q  <b style="color: white"><?php echo "("; total(); echo ")";?></b></a>
          </li></ul>
      
      <!-- tombol login dan daftar -->
    
    <?php include "logout_p.php"; ?>
<!-- Modal -->
</ul> 
</div></div></div>


<div class="container-fluid">
 

  

<!-- End css3menu.com BODY section -->

<div class="col-sm-12 col-md-2" >
<div class="kiri" > 
<div class="panel-heading">
<p><strong>Cari Buku Berdasarkan:</strong></p>
</div>

 <div id="MainMenu">
  <div class="list-group panel">
    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Kategori Buku</a>
    <div class="collapse" id="demo3">
<?php kat(); ?> 
    </div>
  </div>
</div>
<br>
<br>

</div>
<div class="kiri" > 
<div class="panel-heading">
<!-- <p><strong>5 Buku yang Sering Dibaca Minggu Ini:</strong></p> -->
</div>

<h6><strong>1. Perahu Kertas (Novel)</strong></h6>

<a href="#"> <img src="assets/images/perahu kertas.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
</a><br>
<h6><strong> 2. Koala Kumal (Novel)</strong></h6>

<a href="#"> <img src="assets/images/koala kumal.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></a>
<br>
<h6><strong> 3. Komikus Shojo Nozaki (Komik)</strong></h6>
<a href="#"> <img src="assets/images/9786020261294-komikus-shoujo-nozaki-1.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></a>
<br>
<h6><strong> 3. 3600 Detik (Novel)</strong></h6>
<a href="#"> <img src="assets/images/RESENSI-NOVEL-3600-DETIK.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></a>
<br>
<h6><strong> 4. Sir Alex Ferguson (Biografi)</strong></h6>
<a href="#"> <img src="assets/images/SIR Alex Ferguson.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></a>
<h6><strong> 5. Langkah Jitu Memulai Bisnis dari Nol (Motivasi)</strong></h6>
<a href="#"> <img src="assets/images/cover-buku-langkah-jitu-best-seller-new.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></a>
<br>
</div>
</div>
<div class="coba"> </div>


<div class="col-md-9">
<div class="hidden-md">
  <!-- Caption Style -->
    <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #EB5100;
            background-color: rgba(235, 81, 0, 0.6);
        }
        .captionBlack
        {
          font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
          color: #ffffff;
          text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background:url(assets/images/browser-icons.png));
        }
    </style>
</div>
  </div>





<?php


include "Config/config_db.php";

cari();
?>


<div class="col-md-9">
<br><br><p><strong> </strong></p>
      <p><strong>
     </strong></p>
    </div>
</div>


<div class="container footer" style="background-color: #C71585 ">
        <div class="col-sm-6">
          <h4 class="text-orange"><b>Alamat: </b></h4>
          <ul class="no-bullet">
            <b style="color:#FFF">Jl. jendral Sudirman km 3,5<br>
            Palembang<br>Telp. (0000) 33233</b><br>
          </ul>
        </div>
    
</body>
</html>


