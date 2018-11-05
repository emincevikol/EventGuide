<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

			 $subject=$_POST['subject'];
			 $emailto=$_POST['emailaddr'];
			 $message=$_POST['message'];

				function emailkontrol($emailto)
				{
				return preg_match('#^[a-z0-9.!\#$%&\'*+-/=?^_`{|}~]+@([0-9.]+|([^\s\'"<>]+\.+[a-z]{2,6}))$#si', $emailto);
				}

				if ($emailto=="")
				{
				echo "E-posta boş...";
				}else if ($message=="")
				{
				echo "Lütfen iletmek istediginiz Mesaji Yaziniz...";
				}else if(!emailkontrol($emailto))
				{
				echo "Lütfen Email Adresinizi Kontrol Ederek Tekrar Deneyiniz...";
				}else
{

$sender=$_SESSION['fname']." ".$_SESSION['lname'];
$emailfrom=$_SESSION['email'];
$date=date("d-m-Y H:i:s");
$messagecontent="<table width='100%' border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='left' valign='middle' scope='col'><table width='100%' border='0' align='center' cellpadding='2' cellspacing='2' align='center'>
      <tr>
        <td colspan='3' bgcolor='#000000' style='padding:10px 5px 10px 5px;color:#FFF;'><strong>Event Guide</strong></td>
      </tr>
      <tr bgcolor='#CFCDCC'>
        <td width='15%' class='tablo_satiri' style='padding:5px'>Kimden</td>
        <td width='1%' class='tablo_satiri' style='padding:5px'>:</td>
        <td style='padding:5px;'>".$sender."</td>
      </tr>
      <tr bgcolor='#CFCDCC'>
        <td width='200' class='tablo_satiri' style='padding:5px'>Konu</td>
        <td class='tablo_satiri' style='padding:5px'>:</td>
        <td style='padding:5px;'>".$subject."</td>
      </tr>
      <tr bgcolor='#CFCDCC'>
				<td width='200' class='tablo_satiri' style='padding:5px'>Mesaj </td>
				<td class='tablo_satiri' style='padding:5px'>:</td>
        <td ' style='padding:5px;'>".$message."</td>
      </tr>
      <tr bgcolor='#CFCDCC'>
        <td width='200' style='padding:5px;'>Tarih</td>
        <td class='tablo_satiri' style='padding:5px'>:</td>
        <td style='padding:5px;'>".$date."</td>
      </tr>
    </table></td>
  </tr>
</table>";
MailGonder($emailto,$emailfrom,$sender,$subject,$messagecontent);
}

function MailGonder($hedefmail,$kimden,$adsoyad,$baslik,$mesaj)
{
include "class.phpmailer.php";
include "class.smtp.php";
$mail=new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure = "tls";
$mail->Host="eposta.cbu.edu.tr:587";
$mail->Username="muhammedemincevikol@ogr.cbu.edu.tr";
$mail->Password="password";
$mail->From="muhammedemincevikol@ogr.cbu.edu.tr";

$mail->FromName="Event Guide";
$mail->CharSet="utf8";
$mail->AddAddress($hedefmail);
$mail->Subject=$baslik;
$mail->IsHTML(true);
$mail->Body=$mesaj;

if($mail->Send()){
echo "ok";
}
else {
	echo "Mesaj Gönderiminde HATA Olustu:".$mail->ErrorInfo;
}
}
?>
