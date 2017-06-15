<?php

include "config.php";
$durum=false;
$sql = "select * from event";
$result=mysqli_query($con,$sql);
  while($inf = mysqli_fetch_assoc($result)) {
	  
		 $sql1 = "update event set status=1 ";
		 if($result2=mysqli_query($con,$sql1)){
			 $durum=true;
			 echo $inf['id']."<br>";
		 }else{
			 $durum=false;
		 }
	  
	}
	  if($durum==true){
		   echo "Güncelleme Başarılı";
	  }else if($durum==false){
		   echo "Güncelleme Yapılacak Etkinlik Yok";
	  }

?>