<!DOCTYPE html>
<html lang="en">
<?php

include "function.php";
session_start();


?>
<head>
  <title >Library Web Qualitiva.id</title>
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

	<link rel="
  stylesheet" href="Index_files/css3menu0/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>

	<!-- End css3menu.com HEAD section -->
	<style type="text/css">

.isi{
       width:400px;
       margin: 35% ;
       margin-top: 5%;
       margin-bottom: 5%;
       padding: 90px;
       background-color: #F0F8FF;
    }
input[type=text], [type=password] , [type=email], textarea, select {
    width : 90%;
    text-align: center;
    padding: 10px ;
    margin: 10px;
    box-sizing: border-box;
    border: 1px solid indianred;
    border-radius: 10px;

}
input[type=submit]:hover {
    background-color: magenta;
  }
input[type=reset]:hover{
    background-color: magenta;
}
label
{
width: 100px;
margin: 5px;
text-align: left;
}

legend{
  font-family: Comic sans ms;
  color:maroon;
  font-size: 40px;
  text-align: center;
}
</style>

</head>
<body>

<div class="container" style="background-color:#C71585">
  <div  style="background-color:#C71585 " class="nav navbar-inverse" role="navigation"> 
    <div class="container">
  
 <h1 style="text-align: center;" style="color:#FFF">Library Web Qualitiva.id</h1>    
  </div>
</div>
</div>

  <div class="isi">

<form  action="login_p.php" method="post">
  <fieldset>
        <legend>Qualitiva id</legend>
    
 <td>
 	<input type="text" name="username" placeholder="Username">
 </td>
 <br>
    
     <td>
     	<input type="password" name="password" placeholder="password">
     </td>
  <br>
<td><br>
    <input type="submit" value="Login">
    <input type="reset"></td>

</form>

  <div class="col-md-9">
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