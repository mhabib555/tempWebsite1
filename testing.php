<?
include_once 'moduls/function.php';
$title ="translite";
include_once 'moduls/header.php';
error_reporting(0);
set_time_limit(0);
$text = $_GET['text'];
echo '<form method="get">';
echo '<div class="row">Teks:<br><input type="text" name="text"><br>Bahasa sumber:<br><select name="sl"><option value="auto">Tentukan bahasa</option><option value="separator" disabled>&#8212;</option><option  value="sq">Albanian</option><option value="en">Inggris</option><option  value="ar">Arab</option><option  value="af">Afrikaans</option><option  value="be">Belarusia</option><option  value="bg">Bulgaria</option><option  value="cy">Welsh</option><option  value="hu">Hungaria</option><option  value="vi">Vietnamese</option><option  value="gl">Gallegan</option><option  value="nl">Belanda</option><option  value="el">Yunan</option><option  value="da">Denmark</option><option  value="iw">Ibrani</option><option  value="yi">Yunan</option><option  value="id">Indonesia</option><option  value="ga">Irlandia</option><option  value="is">Icelandic</option><option  value="es">Spanyol</option><option  value="it">Italia</option><option  value="ca">Catalan</option><option  value="zh-CN">Cina</option><option  value="ko">Korea</option><option  value="ht">Creole (Haiti) ALPHA</option><option  value="lv">Latvian</option><option  value="lt">Lithuania</option><option  value="mk">Macedonian</option><option  value="ms">Malay</option><option  value="mt">Maltese</option><option  value="de">Jerman</option><option  value="no">Norwegian</option><option  value="fa">Persia</option><option  value="pl">Polish</option><option  value="pt">Portugis</option><option  value="ro">Romanian</option><option  value="ru">Rusia</option><option  value="sr">Serbian</option><option  value="sk">Slovak</option><option  value="sl">Slovenian</option><option  value="sw">Swahili</option><option  value="tl">Tagalog</option><option  value="th">Thailand</option><option  value="tr">Turkish</option><option  value="uk">Ukrainian</option><option  value="fi">Finlandia</option><option  value="fr">Perancis</option><option  value="hi">Hi</option><option  value="hr">Kroasia</option><option  value="cs">Ceko</option><option  value="sv">Swedia</option><option  value="et">Estonian</option><option  value="ja">Jepang</option></select><br>Language Translation:<br><select name="tl"><option  value="sq">Albanian</option><option  value="en">Inggris</option><option  value="ar">Arab</option><option  value="af">Afrikaans</option><option  value="be">Belarusia</option><option  value="bg">Bulgaria</option><option  value="cy">Welsh</option><option  value="hu">Hungaria</option><option  value="vi">Vietnamese</option><option  value="gl">Gallegan</option><option  value="nl">Belanda</option><option  value="el">Yunan</option><option  value="da">Denmark</option><option  value="iw">Ibrani</option><option  value="yi">Yunan</option><option  value="ru">rusia</option><option  value="ga">Irlandia</option><option  value="is">Icelandic</option><option  value="es">Spanyol</option><option  value="it">Italia</option><option  value="ca">Catalan</option><option  value="zh-TW">Cina (Tradisional)</option><option  value="zh-CN">Cina (disederhanakan)</option><option  value="ko">Korea</option><option  value="ht">Creole (Haiti) ALPHA</option><option  value="lv">Latvian</option><option  value="lt">Lithuania</option><option  value="mk">Macedonian</option><option  value="ms">Malay</option><option  value="mt">Maltese</option><option  value="de">Jerman</option><option  value="no">Norwegian</option><option  value="fa">Persia</option><option  value="pl">Polish</option><option  value="pt">Portugis</option><option  value="ro">Romanian</option><option SELECTED value="id">indonesia</option><option  value="sr">Serbian</option><option  value="sk">Slovak</option><option  value="sl">Slovenian</option><option  value="sw">Swahili</option><option  value="tl">Tagalog</option><option  value="th">Thailand</option><option  value="tr">Turkish</option><option  value="uk">Ukrainian</option><option  value="fi">Finlandia</option><option  value="fr">Perancis</option><option  value="hi">Hi</option><option  value="hr">Kroasia</option><option  value="cs">Ceko</option><option  value="sv">Swedia</option><option  value="et">Estonian</option><option  value="ja">Jepang</option></select><br>';
echo'<input type="submit" value="Terjemahkan"></form></div>';

if($text=='' || empty($text))
{
echo '<div class="row">Masukan teks untuk diterjemahkan</div>';
include_once 'moduls/foot.php'; // ��coa�< (��)
exit;
}
$from = $_GET['sl'];
$to = $_GET['tl'];
$text = urlencode($text);


$header = "GET translate.google.ru/m?sl=".$from."&tl=".$to."&prev=_m&q=".$text." HTTP/1.0\r\n";
$header .= "Accept: */*\r\n";
$header .= "Referer: http://e-mail.ru\r\n";
$header .= "Accept-Language: ru\r\n";
$header .= "Content-Type: multipart/form-data\r\n";
$header .= "Proxy-Connection: Keep-Alive\r\n";
$header .= "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)\r\n";
$header .= "Host: e-mail.ru\r\n";
$header .= "Pragma: no-cache\r\n\r\n";
$header .= $auth_data;

$sckt = fsockopen("translate.google.ru",80);
fputs($sckt,$header);

while(!feof($sckt))
{
$serv_answer = fgets($sckt,2048);

$trans = $trans.$serv_answer;
}




$ot = explode('class="t0">',$trans);
$ot2 = explode('>',$ot[1]);
$ot2[0]=strip_tags($ot2[0]);
$slo = explode('<p class="thead">Kamus:',$trans);
$slo2 = explode('<br><br></div>',$slo[1]);
$slo2[0] = str_replace('</div>','',$slo2[0]);
$slo2[0] = str_replace('<div>','',$slo2[0]);
$slo2[0] = str_replace('</p>','',$slo2[0]);
if($ot2[0]=='')
{
echo '<div class="row">Server tidak tersedia atau tidak mungkin untuk menentukan bahasa!</div>';
include_once 'moduls/foot.php'; // ��cra�r (��)
exit;
}
echo'<div class="row"><b>Terjemahan:</b><br>';
echo '<div style="background-color : #e3e5e3;
border-style : dotted;
color: red;
border-width : 1px;
border-color : #b8c1b7;
padding : 1px;
padding-left : 3px;
background-repeat : repeat-y;
font-size : 11px;"><textarea>'.$ot2[0].'</textarea></div></div>';
if($slo2[0]!='')
{
echo '<b>Kamus:</b><br>';
echo '<div style="background-color : #e3e5e3;
border-style : dotted;
border-width : 1px;
border-color : #b8c1b7;
color: red;
padding : 10px;
padding-left : 35px;
background-repeat : repeat-y;
font-size : 11px;">'.$slo2[0].'</div></div>';
}
include_once 'moduls/foot.php';
?>
