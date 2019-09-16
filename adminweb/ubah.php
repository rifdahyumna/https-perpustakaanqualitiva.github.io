<?php	
include "Config/config_db.php";
	
	$p=$_GET['tambahkeranjang'];

if ($p=='tambahkeranjang'){	
		
if(empty($jumlah)){
		echo "<script>window.alert('Maaf, kotak jumlah tidak boleh nol.');
          window.location=('../?info=FormIncomplete')</script>";
    }		
		


		else { $update = mysql_query("update shoppingcart set qty='$qty' shoppingcart where ip_add='$ip'");
		$runupdate =  mysql_num_rows($update);
		//header("location:checkout.php");
		}
}	
		?>