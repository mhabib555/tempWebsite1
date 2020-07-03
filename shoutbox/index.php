<?php //editing scrip dari http://mymotto.110mb.com
//editing file by http://seupang.Co.Cc http://penceter.co.cc
include('../moduls/function.php');
require('./shout.php');
$perf = new perf;
$c=intval(@$_GET['c']);
if(!isset($_SESSION['sgb_admp']))
ob_start();
include('./bcheck.php');
$title = "shoutbox";
include('../moduls/header.php');
if(isset($_SESSION['sgb_admp'])){
echo'<div class="row">
Keterangan utk: D-B-E<br />
D: Delete pesan<br/>
B: Banned user<br />
E: Edit nama, pesan, dan admin jawab pesan<br />
</div>';
}
// Fungsi user online, yg config nya ada di folder shout.php
$onl = new online;
$onl->add();
print'<div class="iblock1"><center>
[<a href="index.php?r='.date('s').'&amp;'.SID.'">Refresh</a>] [<a href="admin.php'.psid().'">Panel</a>]
[Online: <a href="stats.php'.psid().'">'.$onl->cnt.'</a>]<br/ >
<small>'.$perf->show().'</small></center></div>
';
//menyimpan data pesan
// Membuka data gb
$arr=file('./motto.dat');
$cnt=count($arr);
for($i=0;$i<$CONF['ns'];$i++){
if($c==$cnt) break;
$post=unserialize($arr[$c]);
// Hasil post pesan
$nama = $post['nick'];
$nama=strtolower($nama);$jam = $post['time'];
$pesan = $post['text'];
include'./pesan.php';
$browser = strtok($post['br'],' ');
$ip = $post['ip'];
$browser = str_replace('Nokia','NOK ',$browser);$browser = str_replace('SonyEricsson','SE ',$browser);
$browser = str_replace('Siemens','SIE ',$browser);
$browser = str_replace('Motorola','MOT ',$browser);
$browser = str_replace('/',' ',$browser);
$browser = str_replace('Opera','Op',$browser);
$browser = str_replace('Mozilla','Moz',$browser);
$hape = $post['hape'];
$hape = strtok($hape,'/');
$hape = str_replace('/',' ',$hape);
$hape = str_replace('Opera','Op',$hape);
$hape = str_replace('Mozilla','Moz',$hape);
$hape = str_replace('Nokia','NOK ',$hape);
$hape = str_replace('SonyEricsson','SE ',$hape);
$hape = str_replace('Siemens','SIE ',$hape);
$hape = str_replace('Motorola','MOT ',$hape);
$versi = $post['br'];
$versi = explode(' ',$versi);
$versi = $versi[3];
$versi = str_replace("Mini","OpMin",$versi);
$versi = str_replace("/"," ",$versi);
$url = $post['url'];
$url = str_replace("\r\n","",$url);
$email = $post['email'];
$email = str_replace("\r\n","",$email);
$pm = $post['pm'];
// Akhir form mail
print'<div class="aut"><center>'.$jam.'</center></div>';
// Jika sessi admin login, maka akan muncul data utk Delete, Banned dan Edit postingan pengunjung sbb:
if(isset($_SESSION['sgb_admp'])) print('<div class="row"><center><small> [<a href="del.php?n='.$c.'&amp;'.SID.'">D</a>-<a href="ban.php?n='.$c.'&amp;'.SID.'">B</a>-<a href="edit.php?n='.$c.'&amp;'.SID.'">E</a>]</small></center></div>');
include'./nama.php';
// Jika pengunjung posting privat, fungsinya sbb:
if($pm == "oke"){
if(isset($_SESSION['sgb_admp'])){
print'<b>'.$gb.': </b>';
print'<font color="#0088ff">'.$pesan.'</font><br />';
if ($url == "" or $url == "http://"){}else{
$url = eregi_replace('[a-zA-Z0-9.@:%//_\=~#?&]+',
'<a href="\\0">\\0</a>', $url);
print'Lokasi: '.$url.'<br />';
}
// Menampilkan data ISP (Internet Service Provider)
include'./provider.php';
if(isset($_SESSION['sgb_admp'])){
echo'UA: '.$browser.'<br />';
if(trim($hape)){
echo'Mobile: '.$hape.'<br />';
}
print'IP: '.$ip.'<br/>'; }
echo'</div>';
}
if(isset($post['answ'])) print('<div class="row"><span class="re"><b>RE:</b></span> '.$post['answ'].'</div>');
}else{
print'<div class="row"><b>'.$aran.'</b>: ';
print'<font color="#8888ff">'.$pesan.'</font><br />';
// Jika admin menjawab, yg tertampil sbb:
if(isset($post['answ']))
print'<b><font color="#ff0000">RE:</font></b><font color="#ef00ff">'.$post['answ'].'</font><br/>';
// Fungsi email sending gb. Jika ingin memakai, hpus fungsi email di atas.
/*
if ($email == "" or $email == "@"){}else{$email = eregi_replace('[-a-zA-Z0-9.@:%//_\=~#?&]+','<a href="'.$_SERVER['PHP_SELF'].'?gb=mail">\\0</a>',$email);
print $email.'<br />';
}
*/
// Akhir dari email sending.
if ($url == "" or $url == "http://"){}else{
$url =eregi_replace('[a-zA-Z0-9.@:%//_\=~#?&]+',
'<a href="\\0">\\0</a>', $url);
print'Sites: '.$url.'A';
}
// Menampilkan data ISP (Internet Service Provider)
if(isset($_SESSION['sgb_admp'])) {
include'./provider.php';
echo'UA: '.$browser.'<br />';
if(trim($versi)){
echo'Ver: '.$versi.'<br />';
}
if(trim($hape)){
echo'Mobile: '.$hape.'<br />';
}
// Jika nama admin melakukan posting, IP nya di umpetin :p atau bsa di modif yg laen. Hehe..
if($nama == '<b><font color="red">n</font><font color="lime">e</font><font color="white">o</font><font color="fuchsia">&trade;</font></b>'){
print'IP: xxx.xxx.xxx.xxx<br />';
}else{
print'IP: '.$ip.'<br />';
} }
echo'</div>';
}
$c++;
}
echo'<div class="iblock1"><center>';
if($c>$CONF['ns']){
print('[<a href="index.php?c='.($c-$CONF['ns']-$i).'&amp;'.SID.'">&#171;</a>]|');
}else{
print'[&#171;]|';
}
if($c<$cnt){
print('|[<a href="index.php?c='.$c.'&amp;'.SID.'">&#187;</a>]<br />');
}else{
print'|[&#187;]<br />';
}
echo'</center></div>';
echo'<div class="row"><center>Silahkan di corat-coret bro.</center></div>';
print('<div class="row">
<form action="say.php'.psid().'" method="post">
Nama:<br />
<input type="text" name="nick" maxlength="50" size="12" ');
if(isset($_SESSION['sgb_name'])) print('value="'.$_SESSION['sgb_name'].'"');
print(' /><br />
Pesan:<br />
<textarea name="text" rows="3" cols="15">');
if(isset($_GET['n']) && isset($arr[$_GET['n']])){
$_GET['n']=intval($_GET['n']);
$post=unserialize($arr[$_GET['n']]);
print($post['nick'].', ');
}
print('</textarea>');echo'
<input type="hidden" name="url" value="http://" size="12">';
if($CONF['captcha']) print('
<img src="img.php'.psid().'" alt="code" />
<input type="text" name="code" maxlength="10" size="7" />');
$key = rand(00,99);
echo'<br/>* Signup Kode: <font color="red">'.$key.'</font>';
echo'<input type="hidden" name="kode" readonly value="'.$key.'">
<br/><input type="text"     name="hasil" size="8" class="number" maxlength="5">';

print('
<input type="submit" value="Shout!" /><br />
</form>
</div>');
function logout(){
session_destroy();
header("Location: ./");
}
$a = $_GET['a'];
switch ($a){
case "keluar":
logout();
break;
default:
}
// Admin bisa menghapus semua pesan
if(isset($_SESSION['sgb_admp'])){
print('<div class="row"><center>
[<a href="banlist.php'.psid().'">Banlist</a>]<br />
[<a href="del.php?clear&amp;'.SID.'">Clear GB</a>]<br/>[<a href="./?a=keluar">Log out</a>]</center></div>');
}
echo'<div class="title">';
echo'Total pesan: '.$cnt.'</div>';
ob_end_flush();
include'../moduls/foot.php';
?>
