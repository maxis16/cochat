<?
session_start();
include("ayar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $baslik; ?></title>
<meta name="Description" content="<? echo $aciklama;?>" />
<meta name="Keywords" content="<? echo $etiket; ?> " />
  </head>
  <body>
 
<?
$durum = @$_SESSION["durum"];
$zaman = time(); 
$ozmn = $zaman - 5;
if(@$_SESSION["zaman"]<$ozmn)
{
if($durum=="1") {
	 $oda =$obje->temizle(@$_GET['oda']); sef_link(@$_GET['oda']); 
    $mesaj =$obje->temizle(@$_GET['mesaj']);
    $mesaj = strip_tags($mesaj);
    if(strlen($mesaj)<250)
    {
        $bul=array( ':)'=>'<IMG SRC="smiley/gul.gif">', ':('=>'<IMG SRC="smiley/gul2.gif">',';)'=>'<IMG SRC="smiley/gul3.gif">',':O'=>'<IMG SRC="smiley/gul4.gif">',':D'=>'<IMG SRC="smiley/gul5.gif">',':P'=>'<IMG SRC="smiley/gul6.gif">'); 
$mesaj = strtr($mesaj,$bul); 
    $tarih= date("d.m.Y");
    $saat= date("H:i:s");
    $trh =$tarih." ".$saat;
    $kim = $_SESSION["ad"];
    
   $sorgu= $obje->query($sql="insert into $oda (kim,tarih,mesaj,trh) values ('$kim','$trh','$mesaj','$tarih') ");
   echo "Mesaj yollandı.";
   $zaman = time(); 
   $_SESSION["zaman"] = $zaman;

   }else { echo "Mesaj 250 karakterden az olmalıdır.";}
   
 }
 }else  { echo "Yeni mesaj yollamak için 5 saniye beklemelisiniz.";}$obje->close();
?>
  
  </body>
</html>
