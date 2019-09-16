<?php
session_start();//memulai sesi
include "function.php";//memanggil scrip yang ada di file yg diinput
$username=anti_injek($_POST['username']);
$password=anti_injek($_POST['password']);
if(!empty($username) and !empty($password)){
	if(strlen($username)>=3 and strlen($password)>=6){
		
			$password=md5($password);
			$cekLogin= mysqli_query(konek(),"select username, hak_akses from user where username='$username' and password='$password'");
			if(mysqli_num_rows($cekLogin)==1)
			{
				$data = mysqli_fetch_assoc($cekLogin);
				if($data['hak_akses']=="admin")
				{
				$_SESSION['sesUSER']=$username;//penyimpanan sementara
				rdr('admin berhasil login','admin/index.php');
				}
				else if($data['hak_akses']=='siswa')
				{
					$_SESSION['sesUSER']=$username;//penyimpanan sementara
					rdr('siswa berhasil login','dashboard_siswa.php');
				}
			}
			else
			{
				rdr ('admin gagal login. username atau password salah','index.php');
			}

	}
	else
	{
		rdr ('anda gagal login  .username min 3 dan password min 6 char','index.php');
	}

}
else
{	
	rdr('anda gagal login. username dan password harus diisi','index.php');
}


?>