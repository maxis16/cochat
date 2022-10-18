<?
session_Start();
$aaa=1;
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
<? }else {
    ?>
  <div class="panel panel-default">
  <div class="panel-heading">Site Ayarları</div>
   <div class="panel-body">
   <form class="form-signin" role="form" method="post" action="islem.php?id=3">
   <div class="input-group">
  <span class="input-group-addon">Site Başlığı:</span> <input type="text" class="form-control" value="<? echo $baslik; ?>" placeholder="Site Başlığı" name="baslik" required="required" autofocus="autofocus" />
 </div> 
   <div class="input-group">
  <span class="input-group-addon">Site Açıklaması:</span> <input type="text" class="form-control" value="<? echo $aciklama; ?>"  placeholder="Site Açıklaması" name="aciklama" required="required" autofocus="autofocus" />
  </div>
    <div class="input-group">
  <span class="input-group-addon">Site Etiketleri:</span> <input type="text" class="form-control" value="<? echo $etiket; ?>" placeholder="Site Etiketleri" name="etiket" required="required" autofocus="autofocus" />
  </div>
    <div class="input-group">
  <span class="input-group-addon">Reklam Kodu:</span> <input type="text" class="form-control" value="<? echo $reklam; ?>" placeholder="Reklam Kodu" name="reklam" autofocus="autofocus" />
   </div>
     <div class="input-group">
  <span class="input-group-addon">Oto Silme(Varsayılan 0):</span><input type="text" class="form-control" value="<? echo $zgun; ?>" placeholder="Mesajlar otomatik olarak silinir. 2 gün önceki mesajları silmek için 0, 3 gün öncekiler için 1 gibi..." name="zgun" required="required" autofocus="autofocus" />
  </div>
    <div class="input-group">
  <span class="input-group-addon">Bakım Modu:</span><input name="bakim" type="checkbox" value="<? echo $bakim; ?>" onclick="if(this.value==0){this.value=1}else{this.value=0}"<? if($bakim=="1"){echo " checked=\"checked\" ";}?> />
  </div>  <button class="btn btn-lg btn-primary btn-block" type="submit">Değiştir</button>
  </form>
  </div>
  <div class="panel-heading">Şifre Değiştir</div>
  <div class="panel-body">
  <form class="form-signin" role="form" method="post" action="islem.php?id=1">
    <input type="password" class="form-control" placeholder="Mevcut Şifre" name="sifre" required="required" autofocus="autofocus" />
    <input type="password" class="form-control" placeholder="Yeni Şifre" name="sifre1" required="required" autofocus="autofocus" />
    <input type="password" class="form-control" placeholder="Yeni Şifre Tekrar" name="sifre2" required="required" autofocus="autofocus" />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Değiştir</button>
  </form>
  </div><div class="panel-heading">Oda Ekle</div>
   <div class="panel-body">
   <form class="form-signin" role="form" method="post" action="islem.php?id=2">
    <input type="text" class="form-control" placeholder="Oda Adı" name="ad" required="required" autofocus="autofocus" />
     <div class="alert alert-info">
    Boşluk kullanmayın.<br />
  </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Oda Ekle</button>
  </form>
  </div><div class="panel-heading">Oda Sil</div>
   <div class="panel-body">
     <ul class="list-group">
     <?
       $sorgu= $obje->query($sql="select * from oda");
while($oku=mysqli_fetch_Assoc($sorgu))
{
     ?>
<li class="list-group-item">
    <a href="islem.php?sil=<? echo $oku["id"];?>"><? echo $oku["ad"];?> Odasını Sil</a>
  </li>
  <? } ?>
  </ul>
  </div>
  
</div>
 <div class="alert alert-info">
    <? echo "Yönetici olarak giriş yapmışsınız. ";?><a class="alert-link" href="cikis.php">Çıkış Yap</a><br />
  </div>
    <?
}$obje->close();
?>
   </div>
  
</body>
</html>
