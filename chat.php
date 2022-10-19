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
$obje->close();
?>
  
  </body>
</html>
