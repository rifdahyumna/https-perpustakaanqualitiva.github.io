<?php
  session_start();
  include "function.php";
  $isLogin = cek_sesi();
  
  if($isLogin)
  {
    $ISBN = anti_injek($_GET['ISBN']);
    $getpoinsaya = mysqli_query(konek(),"select point from user where username='$_SESSION[sesUSER]'");
    $username = $_SESSION['sesUSER'];    
    $getpoinbuku = mysqli_query(konek(),"select * from buku where ISBN= '$ISBN'");
    if(mysqli_num_rows($getpoinbuku)>0)
    { 
      $poinsaya = $getpoinsaya->fetch_assoc()['point'];
      $buku = $getpoinbuku->fetch_assoc();
      $poinbuku = $buku['poin'];
      $date = date("Y-m-d H:i:s");   

      $cek_my_buku = mysqli_query(konek(), "select ISBN, username from tukar where username = '$username' AND ISBN = '$ISBN'")->fetch_assoc();
      if(isset($cek_my_buku)) {
        rdr('buku anda sudah pernah anda download', $buku['fileBuku']);
        exit();
      }
      if($poinsaya >= $poinbuku)
      {
         mysqli_query(konek(),"insert into tukar values  ('','$ISBN', '$username', '$poinbuku', '$date')");
        
          mysqli_query(konek(),"update user set point= point - $poinbuku where username='$username'");
          
          rdr('point anda sudah berhasil ditukar', $buku['fileBuku']);
         
      }
      else
      {
        rdr('point anda tidak mencukupi','dashboard_siswa.php');
      }
    }
    else
    {
        rdr('buku tidak ditemukan','dashboard_siswa.php');
    }
  }
  else
  {
      rdr('anda gagal login, username dan password harus diisi','index.php');
  }
?>