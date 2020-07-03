<?php
error_reporting(0);
session_start();
//info waktu
$jam = gmdate("D, d-m-Y" , time() +3600*7);
$jam = str_replace("Mon","Senin",$jam);
$jam = str_replace("Tue","Selasa",$jam);
$jam = str_replace("Wed","Rabu",$jam);
$jam = str_replace("Thu","Kamis",$jam);
$jam = str_replace("Fri","Jum'at",$jam);
$jam = str_replace("Sat","Sabtu",$jam);
$jam = str_replace("Sun","Minggu",$jam);
$TimeZone="+7";
$New_Time = time() + ($TimeZone * 60 * 60);
$_time=gmdate("H:i",$New_Time);

//info browsers
if($_SERVER["REMOTE_ADDR"]){$ip=$_SERVER["REMOTE_ADDR"];
$proxy="no";
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);}
else{$ip=$_SERVER["HTTP_X_FORWARDED_FOR"];
$proxy="yes";
$hostname = gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR']);}
$browser = explode("(",$_SERVER["HTTP_USER_AGENT"]);
$browser = $browser[0];
ob_start();
header("Content-type: text/html; charset=utf-8");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified:".gmdate("D, d M Y H:i:s")."GMT");
header("Pragma: must-revalidate");
echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>
<!DOCTYPE html PUBLIC \"-//WAPFORUM//DTD XHTML Mobile 1.0//EN\" \"http://www.wapforum.org/DTD/xhtml-mobile10.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">
<head><title>$_time | $title</title><link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS feed\" href=\"$set[i]\">
<meta name=\"description\" content=\"$set[f]\" />
<meta name=\"author\" content=\"SEUPANG WAP\" />
<meta name=\"keywords\" content=\"$set[f]\" />
<link rel=\"shortcut icon\" href=\"/favicon.ico\"><link rel=\"stylesheet\" href=\"$set[d]\" type=\"text/css\"></style></head><body>";
echo"<div class=\"iblock\"><center><img src='/logo.png' width='150' height='45' alt=''></center></div>";
include("hijriah.php");
echo"<div class=\"menu_razd\">$hijri<br/>$jam ($_time)<br/>";
include("ucapan.php");
if($_SESSION['sgb_name'])
$nami=($_SESSION
['sgb_name']);
else
$nami=$set[g]; echo ''.$nami.'';
echo"</div></div><div class=\"title\"><center><b>$title</b></center></div>";
include"admob.php";
echo'<div class="menu"><center>';
echo admob_request($admob_params);
echo'</center></div>';
echo"<div class=\"menu\"><center><a href=\"/index.php\">home</a> | <a href=\"/loads/\">loads</a> | <a href=\"/shoutbox/\">shout</a> | <a href=\"/bukutamu/\">gebe</a></center></div>";
?>
