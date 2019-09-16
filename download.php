<body>

<?php
session_start();
include "function.php";
$point=mysqli_query(konek(),"select point from user");
$poin=mysqli_query(konek(),"select poin from buku");


      $download= mysqli_query(konek(),"select *from buku");//menmapilkan buku
      if($download->num_rows > 0){
        $no = 1;
        if($point >= $poin)
        {
          //$point=$point-$poin;
          while($row = $download->fetch_assoc()){
          echo '
          <tr>
            <td><a target="_blank" href="'.$row['fileBuku'].'" class="btn btn-primary btn-sm">Download</a></td>
          </tr>
          ';
          $no++;
        $history=mysqli_query(konek(),"
            insert into user(judul, poin)
            (select judul as judul, poin as poin from buku);");
        }
        }
        else
        {
          rdr('point anda tidak mencukupi untuk membaca buku ini','dashboard_siswa.php');
        }
      }
      else{
        echo '<tr><td colspan="5">Tidak ada data</td></tr>';
      }
     ?>
</body>
</html>