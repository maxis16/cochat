<?
session_Start();
include("ayar.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $baslik; ?></title>
<meta name="Description" content="<? echo $aciklama;?>" />
<meta name="Keywords" content="<? echo $etiket; ?> " />
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
<? echo $reklam;?>
  <? if(@$_SESSION["durum"]==null) {?>
  <form class="form-signin" role="form" method="post" action="giris.php">
    <h2 class="form-signin-heading">Giriş Yapın</h2>
    <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="ad" required="required" autofocus="autofocus" />
    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
  </form>
<? if(@$_GET["hata"]!=null){?>  <div class="alert alert-danger"><? echo @$_GET["hata"];?> </div><? } ?>
<? }else {
    ?>
  <div class="panel panel-default">
  <div class="panel-heading">Chat Odaları</div>
  <div class="panel-body">
  <ul class="list-group">

    <?
  
    $sorgu= $obje->query($sql="select * from oda");
while($oku=mysqli_fetch_Assoc($sorgu))
{
    $id= $oku["id"];
    $ad= $oku["ad"];
    $max = $oku["max"];
      $sorgu2 =$obje->query($sql="SELECT * FROM online WHERE oda='$ad'");
$online = $obje->satirsay();
$online++;
    if($online<$max)
    {
    ?>
    <li class="list-group-item">
    <span class="badge"><? echo $online." kişi";?></span>
    <a href="<? echo sef_link($ad);?>-sohbet.html"><? echo $ad; ?></a>
  </li>
    <? } else {
         ?>
    <li class="list-group-item list-group-item-danger">
    <span class="badge"><? echo $online." kişi";?></span>
    <a href="javascript:"><? echo $ad." (DOLU)"; ?></a>
  </li>
    <?
    }
    
}
    ?>
   </ul>
  </div>
</div>
 <div class="alert alert-info">
    <? echo $_SESSION["ad"]." olarak giriş yapmışsınız. ";?><a class="alert-link" href="cikis.php">Çıkış Yap</a><br />
  </div>
    <?
}$obje->close();
?>
   </div>
  
</body>
</html>
