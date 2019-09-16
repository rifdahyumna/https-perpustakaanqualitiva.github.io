<?php
	//Connection Database
	include "../Config/config_db.php";
	
	switch ($_POST['type']) {
		
		//Tampilkan Data 
		case "get":
			
			$SQL = mysql_query("SELECT * FROM penerbit ORDER BY IDPenerbit DESC")or die($sql.'<br>error</br>'.mysql_error());
			$return = mysql_fetch_array($SQL,mysql_fetch_assoc);
			echo json_encode($return);
			break;
		
		//Tambah Data	
		case "new":
			
			$userid = date("ymdhis")."_".rand(0,10);
			$SQL = mysql_query( "INSERT INTO penerbit SET 
										userid = '$IDPenerbit', 
										namaPenerbit ='$_POST[nama]', 
										alamatPenerbit='$_POST[alamat]', 
										Email='$_POST[email]',
										Website='$_POST[website]',
										Notelp = '$_POST[tlp]'") or die ($SQL.'<br>error</br>'.mysql_error());
						
			if($SQL){
				echo json_encode("OK");
			}
			break;
			
		//Edit Data	
		case "edit":
			
			$SQL = mysql_query("UPDATE penerbit SET 
							namaPenerbit ='$_POST[nama]', 
							alamatPenerbit='$_POST[alamat]', 
							Email='$_POST[email]',
							Website='$_POST[website]',
							Notelp = '$_POST[tlp]'") or die ($SQL.'<br>error</br>'.mysql_error());
			if($SQL){
				echo json_encode("OK");
			}			
			break;
			
		//Hapus Data	
		case "delete":
			
			$SQL = mysqli_query($con, "DELETE FROM penerbit WHERE userid='$_POST['IDPenerbit']'");
			if($SQL){
				echo json_encode("OK");
			}			
			break;
	} 
	
?>