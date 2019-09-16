<?php 
include "../../Config/config_db.php";
session_start();
$p = $_GET['p'];
if ($p=='lunas'){
	
$sel_member = "select member.*,OrderData.*,provinsi.provinsiNama,kabupaten.kabupatenNama,kabupaten.Onkoskirim from member,OrderData,provinsi,kabupaten where provinsi.provinsiId=member.provinsiId AND kabupaten.kabupatenId=member.kabupatenId AND  orderdata.id_member=member.id_member AND member.StatusOrder='order' AND orderdata.IDOrder='".$_POST['txtIDOrder']."'";
$cek_sel_member = mysql_query($sel_member) or die (mysql_error());
 $hsl_plg= mysql_fetch_array($cek_sel_member);

	$get_id = $_GET['idorder'];

	
	$update = "update orderdata set StatusOrder='lunas' where IDOrder='$get_id'";
	
	$run_update = mysql_query($update) or die (mysql_error());
	
	$update = "UPDATE member SET StatusOrder='Lunas' 
						WHERE id_member='".$hsl_plg['id_member']."'";
	
	$run_update = mysql_query($update) or die (mysql_error());
	if($run_update){
		
		echo "<script>alert('sukses!')</script>";
		echo "<script>window.open('admin.php?modul=lunas','_self')</script>";
			}
	
} 
	

?>