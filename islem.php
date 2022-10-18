<?
$aaa=1;
session_Start();
include("ayar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CHAT PANELİ</title>
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"> 
<h3><a href="index.php"><span class="label label-primary">Bedava Mobil Sohbet</span></a></h3>
  <? if(@$_SESSION["admin"]==null) {?>
  <form class="form-signin" role="form" method="post" action="islem.php?id=4">
    <h2 class="form-signin-heading">Giriş Yapın</h2>
    <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="ad" required="required" autofocus="autofocus" />
    <input type="password" class="form-control" placeholder="Şifre" name="sifre" required="required" autofocus="autofocus" />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
  </form>
<? if(@$_GET["hata"]!=null){?>  <div class="alert alert-danger"><? echo @$_GET["hata"];?> </div><? } ?>
<? 
  $islem = @$_GET["id"];
  if($islem=="4")
   {
      $sorgu= $obje->query($sql="select * from ayar ");
while($oku=mysqli_fetch_Assoc($sorgu))
{
    $sifre=$oku["sifre"];
    $admin=$oku["admin"];
}
$sifx=md5(md5(@$_POST["sifre"]));
    if((@$_POST["ad"]==$admin)&&($sifx==$sifre))
    {
        $_SESSION["admin"]="1";
        ?>
        <script type="text/javascript">
<!--
	window.location ="ayqo.php";
-->
</script>
        <?
    }else { ?>
        <script type="text/javascript">
<!--
	window.location ="ayqo.php?hata=Kullanıcı adı veya şifre yanlış.";
-->
</script>
        <?}
   }
}else {
    ?>
  <div class="panel panel-default">
  <div class="panel-heading">Panel İşlemeri</div>
   <div class="panel-body">
   <?
   $islem = @$_GET["id"];
   $sil = @$_GET["sil"];
   if($islem=="1")
   {
    $sorgu= $obje->query($sql="select * from ayar ");
while($oku=mysqli_fetch_Assoc($sorgu))
{
    $sif=$oku["sifre"];
}
$sifre=@$_POST["sifre"];
$sifre= md5(md5($sifre));
$sifre1=@$_POST["sifre1"];
$sifre1= md5(md5($sifre1));
$sifre2=@$_POST["sifre2"];
$sifre2= md5(md5($sifre2));
if($sifre==$sif)
{
    if($sifre1==$sifre2){
    $sql2= "update ayar set sifre='$sifre1'";
    $sorgu =$obje->query($sql=$sql2);
    $hata = "Şifreniz değişti.";
    }else{$hata ="Şifreler uyuşmuyor.";}
    
}else {$hata ="Mevcut şifrenizi hatalı girdiniz.";}
   }else if($islem=="3")
   {
    $baslik= $_POST["baslik"];
    $aciklama = $_POST["aciklama"];
    $etiket = $_POST["etiket"];
    $zgun= $_POST["zgun"];
    $reklam = $_POST["reklam"];
    $bakim = @$_POST["bakim"];
    $sql2= "update ayar set baslik='$baslik', aciklama='$aciklama', etiket='$etiket', zgun='$zgun', reklam='$reklam', bakim='$bakim'";
     $sorgu =$obje->query($sql=$sql2);
    $hata = "Site Ayarları değişti.";
   }
   else if($islem=="2")
   {
    $oda = @$_POST["ad"];
    $oda2 = sef_link($oda);
    $sql2="CREATE TABLE IF NOT EXISTS `$oda2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kim` text COLLATE utf8_turkish_ci NOT NULL,
  `kime` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `trh` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1";
$sql3= "INSERT INTO oda (ad, max, gad) VALUES ('$oda', '20', '$oda2');";
   $sorgu =$obje->query($sql=$sql2);
      $sorgu =$obje->query($sql=$sql3);
      $hata ="Oda eklendi.";
   }else if($sil>0)
   {
     $sorgu= $obje->query($sql="select * from oda where id=$sil ");
while($oku=mysqli_fetch_Assoc($sorgu))
{
    $oda=$oku["gad"];
} 
    $sql2="DROP TABLE $oda";
    $sql3="Delete from oda where id=$sil";
     $sorgu =$obje->query($sql=$sql2);
      $sorgu =$obje->query($sql=$sql3);
    $hata ="Oda silindi.";
   }else {$hata="Bilinmeyen Hata";}

    ?>
    <div class="alert alert-danger"><? echo @$hata; ?> - <a class="alert-link" href="ayqo.php">Ayarlara Geri Dön</a></div>
  </div>
  
</div>
 <div class="alert alert-info">
    <? echo "Yönetici olarak giriş yapmışsınız. ";?><a class="alert-link" href="cikisx.php">Çıkış Yap</a><br />
  </div>
    <?
}$obje->close();
?>
   </div>
  
</body>
</html>
