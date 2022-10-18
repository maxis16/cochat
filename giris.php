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
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?
if(@$_SESSION["durum"]=="1")
{
    ?>
    <script type="text/javascript">
<!--
	window.location ="index.php?hata=Daha önce giriş yapmışsınız.";
-->
</script>
    <?
}
function giris()
{
   
$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION["durum"]="1";
?>
<script type="text/javascript">
<!--
window.location ="index.php";
-->
</script><?
}
function getRealIpAddr()  
{  
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  
    {  
        $ip=$_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //Proxy den bağlanıyorsa gerçek IP yi alır.
      
    {  
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else 
    {  
        $ip=$_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  
$ad = @$_POST["ad"];
$ad = $obje->temizle($ad);
$sorgu= $obje->query($sql="select * from guser where ad='$ad'");
$say = $obje->satirsay();
if($say==1)
{
    while($oku=mysqli_fetch_Assoc($sorgu))
    {
        $id=$oku["id"];
        $trh= $oku["tarih"];
    }
$tarih= date("d.m.Y");
$yenitarih = strtotime("-2 day",strtotime($tarih));
$yenitarih = date('d.m.Y' ,$yenitarih );

if($trh<$yenitarih)
{
   $sql2="UPDATE guser set tarih='$tarih' where id=$id"; 
   $sorgu= $obje->query($sql=$sql2);
   $_SESSION["ad"] =$ad;
   giris();
   
}else {
    ?>
    <script type="text/javascript">
<!--
	window.location ="index.php?hata=Lütfen başka bir isim seçin.";
-->
</script>
    <?
}
}else {
$tarih= date("d.m.Y");
     $sql2="insert into guser (tarih,ad) values('$tarih','$ad')"; 
        $sorgu= $obje->query($sql=$sql2);
         $_SESSION["ad"] =$ad;
        giris();
}



 

$_SESSION["ip"]=getRealIpAddr(); $obje->close();
?>

  </body>
</html>
