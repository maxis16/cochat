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
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
var lanetli = 1;
   if(window.innerWidth <= 799 && window.innerHeight <= 599) {
lanetli=0;
   } 
   function lanetlicheck()
   {
   if(lanetli==1)
   {
	  tazele('<? echo $_GET["oda"]; ?>');
	   }
	   }
	    setInterval(function(){lanetlicheck()},5000);
        
</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26624581-19']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
    
    	 $oda =$obje->temizle(@$_GET['oda']);
$sorgu =$obje->query($sql="SELECT * FROM online WHERE oda='$oda'");
$online = $obje->satirsay();
$online++;
        $xtr=0;
        $i=0;
 $sorgu= $obje->query($sql="select * from online where oda='$oda'");
while($oku=@mysqli_fetch_Assoc($sorgu))
{
     $ouser[$i] = $oku["ip"];
     $i++;
     }      

$user = $_SESSION["ip"];
$sorgu= $obje->query($sql="select * from oda where gad='$oda'");
while($oku=@mysqli_fetch_Assoc($sorgu))
{
     $max = @$oku["max"];
     }
     
    
     // user ouser eşleştir.
   $ktrl=0;
     for($k=0;$k<=$i;$k++){
        if($user==@$ouser[$k]) { $ktrl=1;}
     }
if(($online<=$max)||($ktrl==1)) {
         
    $time = time(); 
$zmn = $time - 300;
$ip = $_SESSION["ip"];
$sorgu =$obje->query($sql="SELECT * FROM online WHERE ip='$ip'");
$varmi = $obje->satirsay(); 
if($varmi>0) { 
$sorgu =$obje->query($sql="UPDATE online SET zmn='$time',oda='$oda' WHERE ip='$ip'"); 
}else { 
$sorgu =$obje->query($sql="INSERT INTO online SET ip='$ip',zmn='$time',oda='$oda'"); 

} 
$sorgu =$obje->query($sql="DELETE FROM online WHERE zmn<$zmn"); 

 
   $sorgu2= $obje->query($sql="select * from online where oda='$oda' ");
        $i=0;
while($oku=mysqli_fetch_Assoc($sorgu2))
{
    $ouser[$i]=$oku["ip"];
    $i++;
}
  $sorgu= $obje->query($sql="select * from oda where gad='$oda'");
while($oku=@mysqli_fetch_Assoc($sorgu))
{
     $max = $oku["max"];
    $id= $oku["id"];
    $ad= $oku["ad"];
   
    $xtr=1;
    
                
    ?>
     <div class="panel panel-default">
  <div class="panel-heading"><? echo $ad." - $online kişi var odada.";?> <a href='javascript:window.location.reload()'>Sayfayı Yenile</a></div>
  <div class="panel-body">
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
  
      <input id="mesaj" type="text" class="form-control" placeholder="Mesaj:" />
      <span class="input-group-btn">
        <button id="gonder" onclick="javascript:yolla('','<? echo $oda; ?>'); " class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span> Gönder</button>
      </span>
     
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
 <div id="chat" class="chat">
<?

	 $oda =$obje->temizle(@$_GET['oda']); sef_link(@$_GET['oda']); 
   $sorgu= $obje->query($sql="select * from $oda ORDER BY tarih DESC LIMIT 0 , 30 ");
        $xtr2=0;
while($oku=mysqli_fetch_Assoc($sorgu))
{
    $id=$oku["id"];
    $kim= $oku["kim"];
    $kime= @$oku["kime"];
    $tarih = $oku["tarih"];
    $mesaj = $oku["mesaj"];
    $xtr2=1;
    if($kime==Null)
    {
        echo "<b>$kim:</b> $mesaj <i>$tarih</i><br />";
    }
}
if($xtr2==0) {echo "Güncel mesaj yok.";}
$tarih= date("d.m.Y");
$yenitarih = strtotime("-$zgun day",strtotime($tarih));
$yenitarih = date('d.m.Y' ,$yenitarih );
$sql2="DELETE FROM $oda WHERE trh<'$yenitarih'";
$sorgu= $obje->query($sql=$sql2); 

?>
  </div></div>
</div>
    <?   
    
       
  if($xtr==0) {
    ?>
<div class="alert alert-danger">
    Sayfa bulunamadı. <a class="alert-link" href="index.php">Ana sayfaya dön.</a>
  </div><?} }
}else {?>
<div class="alert alert-danger">
    Oda dolmuştur. <a class="alert-link" href="index.php">Ana sayfaya dön.</a>
  </div><?}

}
?>
 <div class="alert alert-info">
 <div id="hata"></div>
<a class="alert-link" href="cikis.php">Çıkış Yap</a><br />
  </div>
    <?
$obje->close();
?>
   </div>
  
</body>
</html>
