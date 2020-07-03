<?php
include "moduls/function.php";
$title ="FREE download";
require 'moduls/header.php';
require 'shoutbox/shoutbox.php';
error_reporting(0);
// Fank grabber v 2.0
// By LONGMAN http://geg.ge ICQ: 1968545
// Ar gavigo vinmem gayidos tore ooo ;)
echo '<div class="iblock1">FREE download</div><div class="row">';
$z = (!empty($_GET["z"])) ? str_replace(' ','%20',$_GET["z"]) : 'main/';


$z .= (!empty($_GET["pg"])) ? '&pg='.$_GET["pg"] : '';
if(!empty($_POST["q"])) $z .= '?&q='.$_POST["q"]; elseif(!empty($_GET["q"])) $z .= '&q='.$_GET["q"];

$z .= (!empty($_POST["qpg"])) ? '&qpg='.$_POST["qpg"] : '';



$host = "fank.mobi";
$pathh = '/'.$z;
$fp = fsockopen($host,80,$errno, $errstr,10);
if(!$fp)
{
echo "$errstr ($errno)<br/>\n";
}
else
{

$headers = "GET $pathh HTTP/1.0\r\n";
$headers .= "Host: $host\r\n";
$headers .= "Accept: *\r\n";
$headers .= "Accept-Charset: UTF-8\r\n";
$headers .= "Accept-Charset: *\r\n";
$headers .= "Accept-Encoding: deflate\r\n";
$headers .= "Accept-Language: ru\r\n";
$headers .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; ru) Opera 9.60\r\n";

$headers.="\r\n";
@fwrite($fp, $headers);

$file = '';
while(!feof($fp)) $file .= @fgets($fp, 4096);
@fclose($fp);
}


if($z == 'main/')
{
$a = explode('<div class="body">',$file);

$b = explode('</div>',$a[2]);

$file = $b[0];
}
else
{


$a = explode('<div class="body">',$file);

$b = @explode('</div>',$a[1]);

$file = $b[0];

$file = preg_replace('#<a href="(.*)?f=http://(.*)</a>#','<a href="http://\\2</a>',$file);
}

$file = str_replace('="/', '="'.$_SERVER["PHP_SELF"].'?z=', $file);



$file = str_replace('Games', 'Games', $file);
$file = str_replace('Video', 'Videos', $file);
$file = str_replace('Pictures', 'Pictures', $file);
$file = str_replace('Ringtones', 'Ringtones', $file);
$file = str_replace('Programs', 'Programs', $file);

$file = str_replace('Themes', 'Themes', $file);


$file = str_replace(' from ', '/', $file);


$file = str_replace('Artist:', 'Artist:', $file);

$file = str_replace('Type:', 'Type:', $file);

$file = str_replace('Size:', 'Zize:', $file);

$file = str_replace('Tags:', 'Tags:', $file);
$file = str_replace('Name:', 'Name:', $file);

$file = str_replace('Year:', 'Year:', $file);
$file = str_replace('Developer:', 'Developer:', $file);


$file = str_replace('Total:', 'Total:', $file);


$file = str_replace('Song:', 'Song:', $file);

$file = str_replace('Length:', 'Length:', $file);

$file = str_replace('Listen', 'Listen', $file);


$file = str_replace('new for a week', 'new for a week', $file);

$file = str_replace('new for days.', 'new for days.', $file);
$file = str_replace('Select size image for preview', 'Select size image for preview', $file);

$file = str_replace('without preview', 'With out preview', $file);

$file = str_replace('__pilih icons', 'Airchiet shemsruleblis pirveli aso', $file);




$file = str_replace('&nbsp;', ' ', $file);
$file = str_replace('class="scr" ', '', $file);
$file = str_replace('<span class="noscr">', '<span style="text-align: left;">', $file);
$file = str_replace('<div class="scroller">', '', $file);
$file = str_replace(' columns="5"', '', $file);


$file = str_replace('method="get"', 'method="post"', $file);
$file = str_replace('<input type="hidden"', '</div><input type="hidden"', $file);
$file = str_replace('</form>', '</div></form>', $file);
$file = str_replace('">Go:', '"></div>Go:', $file);



$file = strip_tags($file,'<br/><a><b><i><u><img><span></div><td><tr><table><form><input>');
echo (!empty($file)) ? $file : 'Page was not found!<br/>';



echo '</div>';

if($z !== 'main/') echo '<div class="row"><a href="'.$_SERVER["PHP_SELF"].'">&lt;&lt;Downloads</a></div>';
require 'moduls/foot.php';
?>
