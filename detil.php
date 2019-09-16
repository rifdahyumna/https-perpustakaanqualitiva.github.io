<?php
include "function.php";
session_start();
// $kd = $_GET['ISBN'];
// $q = mysqli_query(konek(),"SELECT * from buku where ISBN='$kd'");
// $detil= mysqli_fetch_array($q);

$kd = $_GET['ISBN'];  
$q = mysqli_query(konek(),"SELECT judul,deskripsi,namaKategori,poin,fileGambar FROM buku , kategori_buku  WHERE buku.IDKategori=kategori_buku.IDKategori AND buku.ISBN = '$kd' ") or die($q.mysqli_connect_error(konek()));
$detil= mysqli_fetch_array($q);
  
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



<div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header" style="text-align:center;background:#4682b5;color:#fff;">
                  
                  <div class="container-fluid">
                        <h3 style="color: black">Detail buku "<i style="font-size:20px;color: black"><?php echo $detil['judul']; ?></i>"</h3>
                  </div>
            </div>
            <div class="modal-body">
            <div class="row">
                  <div class="detailbuku">
                  <div class="col-md-4">
                        <img  src="adminweb/img/<?php echo $detil['fileGambar'];  ?>" style="width: 150;height: 150"   >
                  </div>
                  <div class="col-md-6">
                  <table>
                  <tr>
                  <td width="140px;"><p>Judul</td><td>: <?php echo $detil['judul']; ?></p></td>
                  <tr>
               <!-- <td><p>deskripsi</td><td>: <?php //echo $detil['deskripsi']; ?></p></td> -->
                  </tr>
                  <tr>
                  <td><p>Kategori</td><td>: <?php echo $detil['namaKategori']; ?></p></td>
                  </tr>
                  <tr>
                  <td><p>Poin</td><td>: <?php echo $detil['poin']; ?>,-</p></td>
                  </tr>
                  </table>
                  </div>
                  </div>
           </div>
            <i style="font-size:20px;">Deskripsi :</i><p><?php echo $detil['deskripsi']; ?></p>
            </div> 
            <div class="modal-footer">
                      <button  onclick="history.back()" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true" >
                              Kembali
                      </button>
                  </div>
      </div>
</div>