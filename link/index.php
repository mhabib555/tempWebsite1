<?php
include'../moduls/function.php';
$password = "$set[b]";
$time_format = 'd-m-y H:i:s';
$nungul = 1;
$per_page = 10;
$per_Hal = 1;
$data_file = "./dblink.php";
$divider = '|~|';
if(!isset($HTTP_REQUEST_VARS)) $HTTP_REQUEST_VARS = $_REQUEST;
if(!isset($HTTP_SERVER_VARS)) $HTTP_SERVER_VARS = $_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
if(!isset($pw)) $pw = '';
if(!isset($p)) $p = 1;
if(!isset($do)) $do = '';
$wlink=gmdate('H:i',time()+3600*(7));
$title ='Link Partner | Tukar Link | Promo Situs';
$keyword='tukar link,url,partner site, non xxx,bukan toplist,cari teman,tulis,link exchange';
$desc='Bukan toplist,hanya sarana untuk tambah teman dan memperpanjang tali silaturahmi lewat dunia maya.';
include '../moduls/header.php';
function foot() { global $PHP_SELF, $p;
include '../moduls/foot.php'; }
function defaultpage() {
global $PHP_SELF, $p, $per_page, $data_file, $divider, $time_format;
echo"<div class=\"iblock1\">Silahkan tambahkan link wap,web,blog kamu <a href=\"./index.php?do=join\">disini</a></div>\n";
$data = file($data_file);
rsort($data);
$total_all = ceil(count($data));
$total_page = ceil(count($data) / $per_page);
if($p < 0 || $p > $total_page) $p = 1;
$no = $p * $per_page - $per_page;
for($i=0; $i<$per_page; $i++) {
if(isset($data[$no])) {
$line = explode($divider, $data[$no]);
$time = gmdate($time_format, $line[0]);
$nom=$no+1; $num=$total_all-$no;
echo '<div class="row">['.$nom. ']. <a href="friend.php?site_id='.$num.'">'.$line[1].'</a><br />Join : '.$time.' wib</div>';
}
$no++;
}
echo '<div class="iblock1">';
if($p > 1){ echo "<a href=\"./index.php?p=".($p-1)."\">".($p-1)." </a> ";} else{echo '<b>'.$p.'</b>'; }
echo '<b> '.$p.' </b>'; if($p < $total_page) {
echo " <a href=\"./index.php?p=".($p+1)."\"> ".($p+1)."</a>";}
else{ echo '<b> '.$p.'</b>';}
echo"</div>";
echo "<div class=\"row\">Total: $total_all teman<br />"; echo ('<form action="./index.php" method="post"><input type="text" name="p" size="2" /><br /><input type="submit" value="Go" /></form></div>');
echo "<div class=\"menu\">&raquo; <a href=\"./?do=admin\">Admin panel</a></div>";
foot();}
function add() {
global $PHP_SELF, $p, $nungul, $data_file, $divider, $time_format;
$data = file($data_file);
rsort($data);
$total_all = ceil(count($data));
$total_page = ceil(count($data) / $nungul);
if($p < 0 || $p > $total_page) $p = 1;
$no = $p * $nungul -$nungul;
for($i=0; $i<$nungul; $i++) {
if(isset($data[$no])) {
$line = explode($divider, $data[$no]);
$time = gmdate($time_format, $line[0]);
$nom=$no+1; $num=$total_all-$no;
echo '<div class="row">Terima kasih <b>'.$line[2].'</b> sudah bergabung di sini<br />
link kamu : <br />
<input type="text" value="http://'.$_SERVER['HTTP_HOST'].'/link/friend.php?site_id='.$num.'" /></div>
<div class="row"><a href="./friend.php?site_id='.$num.'">Next</a></div>';
}
$no++;
} foot();}
function form($stop) {
global $PHP_SELF;
echo'<div class="row"><b><u>Add ur site</u></b></div><form action="./index.php?do=tambah" method="post">';
echo "\n";
if($stop != '') echo "$stop<br>\n";
echo '<div class="iblock1"><b>PENGUMUMAN</b></div>
<div class="row">1. Ini bukan Toplist atau sejenisnya,hanya sarana untuk menambah teman dan memperpanjang tali silaturahmi <br />
2. Bagi situs yg di dalam nya terdapat <b>content XXX</b> ,di harap tidak memajang situs nya di sini <br />
3. Tidak di wajibkan memasang link saya di situs kamu,tapi kalau memang mau ya silahkan copas link di bawah ini =D <br />
<input type="text" value="http://'.$_SERVER['HTTP_HOST'].' " /><br /></div><div class="row">
*Nama site:<br />
<input type="text" name="name" /><br />*Owner : <br /><input type="text" name="owner" /><br />
Logo :<br /><input type="text" name="logo" value="http://" /><br />*Deskripsi :<br />
<input type="text" name="msg" /><br />
Email:<br />
<input type="text" name="email" value="@" /><br />
*URL :<br /><input type="text" name="url" value="http://" /><br />';
$angka = str_shuffle('abcdefghijklmn123456789');
$angka=substr($angka,0,5);
echo '*Kode: '.$angka.'<br />'; echo'<input type="hidden" name="angka" value="'.$angka.'" />
<br /><input type="text" name="capcai" class="input_angka" value="" /><br />
<input type="hidden" name="do" value="add" /><input type="submit" value="Joint" />
';
echo '</form></div><div class="row"> *required</div>'; foot();
die();
}
function view()
{
global $PHP_SELF, $p, $per_page, $data_file, $divider, $pw, $password, $time_format;
echo'<div class="iblock1"><b>admin panel</b></div>';
if($password==$pw)
{
$data=file($data_file);
rsort($data);
$data=file($data_file);
rsort($data);
$total_all=ceil(count($data));
$total_page=ceil(count($data) / $per_page);
if($p < 0 || $p > $total_page)
$p=1;
$no=$p * $per_page - $per_page;
for($i=0; $i<$per_page; $i++)
{
if(isset($data[$no]))
{
$line=explode($divider,$data[$no]);
$time=gmdate($time_format, $line[0]);
$num=$total_all-$no;
echo '<div class="row"><a href="friend.php?site_id='.$num.'">'.$line[1].'</a>
<br />
';
echo"[<a href=\"./index.php?do=delete&amp;id=$line[0]&amp;pw=$pw\">hapus</a>]";
echo "</div>\n";
}
$no++;
}
$pw = isset($pw) ? "&amp;pw=$pw" : '';
if($p > 1){ echo "<a href=\"./index.php?do=admin&amp;p=".($p-1)."$pw\">&laquo;</a> ";} else{}
if($total_page > 1) echo "$p/$total_page [$total_all]";
if($p < $total_page) {
echo "<a
href=\"./index.php?do=admin&amp;p=".($p+1)."$pw\">&raquo;</a>";}else{}
echo'</div>';
}else{
echo'<form action="index.php" method="post">
Password :<br /><input type="password" name="pw" />
<br /><input type="hidden" name="do" value="admin" />
<input type="submit" value="Login" />
</form></div>';
}
foot();
die();
}
function textfilter($text, $len) {
global $divider;
$text = trim($text);
$text = substr($text,0,$len);
$text = htmlspecialchars($text);
$text = str_replace($divider, '', $text);
return $text;
}
switch($do) {case "add":if($kembali == "Cancel")
{
defaultpage();
break;
}
$name = str_replace("gila","",$name);
if(trim($name) == '' || trim($name) == 'Gila' || trim($name) == 'GILA' || trim($name) == 'gIla' || trim($name) == 'gilA' || trim($name) == 'GiLa' || trim($msg) == '' )
form('Coba lagi pake nama yang laen!');
if(strlen($name) < 3)
if (!preg_match("/^[a-zA-Z0-9]*$/", $name))
form('Nama site ga boleh kurang dari 3 huruf!');
if($url=='' && $url=='http://') form('Url masih kosong!');
if(strlen($msg) < 10)
form('deskripsi ga boleh kurang dari 10 karakter!');
$angka=$_POST['angka']; $capcai=$_POST['capcai'];
if($angka != $capcai) form('<b>Kode salah</b>!');
if ($url != "" && $url != 'http://') {
if (!preg_match('#^http[s]?:\/\/#i', $url)) {
$url = 'http://' . $url;
}
if
(!preg_match('#^http[s]?\\:\\/\\/[a-z0-9\-]+\.([a-z0-9\-]+\.)?[a-z]+#i', $url)) {
$url = '';
}
}
if (ereg("\r\n",$url)) {
$url = '';
}
$url = stripslashes($url);
$url = str_replace("\r\n","",$url);
$url = textfilter($url,100);
$url = trim($url);
if($logo !="" && $logo !='http://') { if(!preg_match('#^http[s]?:\/\/#i' ,$logo))
{
$logo = 'http://' . $logo;
}
if
(!preg_match('#^http[s]?\\:\\/\\/[a-z0-9\-]+\.([a-z0-9\-]+\.)?[a-z]+#i', $logo)) {
$logo = '';
}
}
if (ereg("\r\n",$logo)) {
$logo = '';
}
$logo = stripslashes($logo);
$logo = str_replace("\r\n","",$logo);
$logo =textfilter($logo,300);
$logo=trim($logo);
$owner=textfilter($owner,30);
$email=textfilter($email,50);
$name = textfilter($name,15);
$msg = textfilter($msg,500);
$capcai = textfilter($capcai,3);
$arr = array(";", "'", "\"", "(", ")", "$", "{", "}", "%", "<", ">", "|", "^");
$name = str_replace("$arr", "", $name);
$email=str_replace("$arr","",$email);
$owner=str_replace("$arr","",$owner);
$capcai = str_replace("$arr", "", $capcai);
$msg = str_replace("$arr", "", $msg);
$url = str_replace("$arr", "", $url);
$logo=str_replace("$arr","",$logo);
$name = htmlspecialchars($name);
$owner=htmlspecialchars($owner)
;
$capcai = htmlspecialchars($capcai);
//$msg = htmlspecialchars($msg);
$email=htmlspecialchars($email);
$logo=htmlspecialchars($logo);
$url = htmlspecialchars($url);
$name = str_replace("\n", "", $name);
$owner=str_replace("\n","",$owner);
$logo=str_replace("\n","",$logo);
$email=str_replace("\n","",$email);
$capcai = str_replace("\n", "", $capcai);
$msg = str_replace("\n", "", $msg);
$url = str_replace("\n", "",$url);
$name = str_replace("\r", "", $name);
$owner=str_replace("\r","",$owner);
$email=str_replace("\r","",$email);
$logo=str_replace("\r","",$logo);
$capcai = str_replace("\r", "", $capcai);
$msg = str_replace("\r", "", $msg);
$url = str_replace("\r", "", $url);
$msg = str_replace($sstr, $simg, $msg);
$data = file($data_file);
rsort($data);
if(count($data) > 3) {
for($i=0; $i<3; $i++) {
$line = explode($divider, $data[$i]);
if($line[1] == $name && $line[3] == $msg) {flooding(); break;}
}
}
$time = 7*3600+time();
$new =
"$time$divider$name$divider$owner$divider$msg$divider$url$divider$email$divider$logo$divider\n";
$new = stripslashes($new);
$f = fopen($data_file, 'a');
fwrite($f, $new);
fclose($f);
add();
break;
case "delete":
if($password == $pw && !empty($id)) {
$data = file($data_file);
$f = fopen($data_file, 'w');
for($i=0; $i<count($data); $i++) {
$line = explode($divider, $data[$i]);
if($line[0] != $id) fputs($f, rtrim($data[$i]) . "\n");
}
fclose($f);
}
view();
break;
case "join":
form('');
break;
case "admin":
view();
break;
case "tambah":
add();
break;
default:
defaultpage();
break;
}
die();
function flooding()
{echo'
Flooding... !!<br />';
foot();
die();
}
?>
