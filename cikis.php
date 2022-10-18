<?
session_start();
include("ayar.php");
$_SESSION["durum"]=null;
$_SESSION["ad"]=null;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo $baslik; ?></title>
<meta name="Description" content="<? echo $aciklama;?>" />
<meta name="Keywords" content="<? echo $etiket; $obje->close();?> " />
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
<script type="text/javascript">
<!--
	window.location="index.php?hata=Başarıyla çıkış yaptınız.";
-->
</script>
  </body>
</html>
