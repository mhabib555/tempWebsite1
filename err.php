<?
$time=time();
ini_set('register_globals', 0);
ini_set('session.use_cookies', 1);
ini_set('session.use_trans_sid', 1);
ini_set('arg_separator.output', "&amp;");


function compress_output_gzip($output){return gzencode($output,9);}
function compress_output_deflate($output){return gzdeflate($output, 9);}
// сжатие по умолчанию
$Content_Encoding['deflate']=false;
$Content_Encoding['gzip']=false;
// включение сжатия, если поддерживается браузером
if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && ereg('deflate',$_SERVER['HTTP_ACCEPT_ENCODING']))$Content_Encoding['deflate']=true;
if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']))$Content_Encoding['gzip']=true;
// Непосредственное включение сжатия
if ($Content_Encoding['deflate']){header("Content-Encoding: deflate");ob_start("compress_output_deflate");}
elseif($Content_Encoding['gzip']){header("Content-Encoding: gzip");ob_start("compress_output_gzip");}
else ob_start(); // если нет сжатия, то просто буферизация данных


session_name('SESS');
session_start();
$sess=mysql_escape_string(session_id());
header("HTTP/1.0 404 Not Found");
header("Status: 404 Not Found");
header("Refresh: 3; url=/index.php");
if (isset($_GET['err']) && is_numeric($_GET['err']))
{
$err=intval($_GET['err']);
header("Content-type: text/html",NULL,$err);
echo "<html>
<head>
<title>error $err</title>\n";
echo "<link rel=\"stylesheet\" href=\"/style.css\" type=\"text/css\" />\n";
echo "</head>\n<body>\n<div class=\"row\"><div class=\"row\">\n";

if ($err=='400')echo "Anda tidak dapat menuju,halaman BUG DI QUERY\n";
elseif ($err=='401')echo "Tidak ada hak untuk membuka DOKUMEN\n";
elseif ($err=='402')echo "Tidak dapat memenuhi permintaan KODE\n";
elseif ($err=='403')echo "HALAMAN TERLARANG\n";
elseif ($err=='404')echo "Halaman yg anda tuju tidak di temukan,harap hubungi Admin untuk info lebih lanjut\n";
elseif ($err=='500')echo "Internal server Error\n";
elseif ($err=='502')echo "Server menerima respon yg tidak di izinkan dari server lain\n";
else echo "Unknown Error\n";
echo "<br />";
echo "<a href=\"/\">Home</a>";
echo "</div>\n</div>\n</body>\n</html>";
exit;
}
else
header ("Location: /index.php?".SID);
exit;
?>
