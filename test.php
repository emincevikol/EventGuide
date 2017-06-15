<?php
try{
include "include/config.php";
$durum=false;
$sql = "select * from event where status=1";
$buguntarihi=date('Y-m-d');
$result=mysqli_query($con,$sql);
  while($inf = mysqli_fetch_assoc($result)) {
	  
	  if($inf['date'] <= $buguntarihi){
		 $sql1 = "update event set status=-1 where id=".$inf['id'];
		 if($result2=mysqli_query($con,$sql1)){
			 $durum=true;
			 echo $inf['id']."<br>";
		 }else{
			 $durum=false;
		 }
	  }
	}
	  if($durum==true){
		   echo "Güncelleme Başarılı";
	  }else if($durum==false){
		   echo "Güncelleme Yapılacak Etkinlik Yok";
	  }
}catch(Exception $e) {
	$myfile = fopen("eventlog.txt", "w") or die("Dosya Açılamadı!");
	$txt = 'Hata: ' .$e->getMessage();
	fwrite($myfile, $txt);
	fclose($myfile);
}
?>