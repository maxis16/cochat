<?php

/**
 * @author Aykut Alp Tabaklar
 * @copyright 2014
 * @Destek İçin http://www.ayqo.net/2014/03/ucretsiz-mobil-chat-scripti.html
 */

include_once("func.php");
$obje = new Func("DATABASE_URL","root","","chat"); // localhost, db_kullanıcı, db_şifre, db_adı şeklinde girin.
$obje->connect();

if(session_id() == '') {
   session_start();
}
if(@$_SESSION["ayarli"]!="1"){
$sorgu= $obje->query($sql="select * from ayar ");
while($oku=mysqli_fetch_Assoc($sorgu))
{
$baslik= $oku["baslik"];
$aciklama=$oku["aciklama"];
$_SESSION["aciklama"]= $aciklama;
$etiket=$oku["etiket"];
$_SESSION["etiket"]= $etiket;
$zgun= $oku["zgun"];
$_SESSION["zgun"]= $zgun;
$reklam = $oku["reklam"];
$_SESSION["reklam"]= $reklam;
$bakim = $oku["bakim"];
$_SESSION["bakim"]= $bakim;
$_SESSION["baslik"]= $baslik;
$_SESSION["ayarli"]="1";
}}else {
    $baslik =$_SESSION["baslik"];
    $aciklama =$_SESSION["aciklama"];
    $etiket =$_SESSION["etiket"];
    $zgun =$_SESSION["zgun"];
    $reklam =$_SESSION["reklam"];
    $bakim =$_SESSION["bakim"];
}

if(($bakim=="1")&&(@$aaa!=1))
{
    echo "Site bakımda";
exit();
}

date_default_timezone_set('Europe/Istanbul'); 
function sef_link($bas)
{	
	$bas = str_replace(array("&quot;","&#39;"), NULL, $bas);
	$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
	$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
	$perma = strtolower(str_replace($bul, $yap, $bas));

	$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
	$perma = trim(preg_replace('/\s+/',' ', $perma));
	$perma = str_replace(' ', '-', $perma);
	return $perma;
}
?>
