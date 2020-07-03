<?php
/*
* *
* Simple Guestbook g3ni Version 2.0
* Release : 10 Mei 2009
* Home : http://geen.kilu.de
* * *
*/
session_start();
include "../moduls/function.php";
require ('inc/sets.php');
$adminpass = $set[b];
$zona = $set[3];
if(isset($_POST['nick']) && isset($_POST['mess'])){
function shit_happened($shit='Unknown error'){
$_SESSION['sgb_err']=$shit;
Header('Location: '.$_SERVER['PHP_SELF']);
exit;
}
$nick = $_POST['nick'];
$mail = $_POST['mail'];
$site = $_POST['site'];
$mess = $_POST['mess'];
$pilih = $_POST['pilih'];
$thn_site =
date("y", time() + ($zona * 3600));
$bln_site = date("m", time() + ($zona * 3600));
$tgl_site = date("j", time() + ($zona * 3600));
$jam = date('H:i', time() + ($zona * 3600));
$real = $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'];
$real = strtok($real, "/");
$real = str_replace("SonyEricsson", "SE ", $real);
$real = str_replace("Nokia", "Nokia ", $real);
$real = str_replace("Motorola", "Mot ", $real);
$real = str_replace("Siemens", "Sie ", $real);
$broww = explode(' ', $_SERVER['HTTP_USER_AGENT']);
$brow = $broww[0];
$versi = $broww[3];
$versi = str_replace("Mini", "OpMin", $versi);
$versi = substr($versi, 0, 15);
if (isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])){
$ua = "$versi [$real]";
} else {
$ua = $brow;
}
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}
$ua = str_replace("/", " ", $ua);
$ua = str_replace("SonyEricsson", "SE ", $ua);
$ua = str_replace("Nokia", "Nokia ", $ua);
$ua = str_replace("Motorola", "Mot ", $ua);
$ua = str_replace("Siemens", "Sie ", $ua);
$via = $_SERVER['HTTP_VIA'] ? $_SERVER['HTTP_VIA'] : "emboeh";
//Mulai fungsi data jika error terjadi
if(!isset($_SESSION['sgb_name']) or $_SESSION['sgb_name']!=$nick) $_SESSION['sgb_name']=$nick;
if(!isset($_SESSION['sgb_mess']) or $_SESSION['sgb_mess']!=$mess) $_SESSION['sgb_mess']=$mess;
if(!isset($_SESSION['sgb_mail']) or $_SESSION['sgb_mail']!=$mail) $_SESSION['sgb_mail']=$mail;
if(!isset($_SESSION['sgb_site']) or $_SESSION['sgb_site']!=$site) $_SESSION['sgb_site']=$site;
if(empty($nick) || empty($mess)) shit_happened('Hayo!! Nama atau Pesan kudu di isi!');
if(strlen($nick)>15) shit_happened('Nama gak blh lebih dari 15 karakter.');
if(strlen($nick)<3) shit_happened('Nama gak blh kurang dari 3 karakter.');
if(trim($nick) == '' || trim($nick) == 'admin' || trim($nick) == 'Admin' || trim($nick) == 'ADMIN' || trim($nick) == 'aDmIn' || trim($nick) == 'AdMiN' || trim($nick) == 'robot' ||
trim($nick) == 'Robot' ||
trim($nick) == 'RoBoT' ||
trim($nick) == 'ROBOT' ||
trim($nick) == '' )
shit_happened('mohon pergunakan nama lain');
if(strlen($mess)<3) shit_happened('Pesan gak blh kurang dari 3 karakter.');
if(strlen($mess)>$set[a]) shit_happened('Pesan gak blh lebih dari '.$set[a].' karakter.');
if ($mail != '') {
if (!(preg_match("/^[a-z][a-z0-9_\-\.]{1,16}@[a-z][a-z0-9_\-\.]{3,20}$/i",$mail))) shit_happened('Email tdk valid.');
if(strlen($mail)>30) shit_happened('Email gak blh lebih dari 30 karakter.');
}
if ($site != '') {
$site = 'http://'.str_ireplace('http://','',$site);
if(strlen($site)>30) shit_happened('Sites gak blh lebih dari 30 karakter.');
}
if (empty($_POST['key'])) shit_happened('Kode msh kosong.');
if ($_POST['key'] != $_SESSION['key']) shit_happened('Kode tdk valid, ulangi !');
//Mulai protect flooding
if (($pilih == "gb") || ($pilih == "pm")){
$data = file("brakakakawmJMGDMGJGtjagmMGDGDtphmgd.dat");
}
$ttl = count($data);
for($x = 0; $x < $ttl; $x++){
$isi = explode("|",$data[$x]);
}
if (($isi[0] == $nick) && ($isi[4] == $mess)) shit_happened('Ngeplud, jitax !');
function processing($string) {
$string = trim($string);
$string = htmlspecialchars($string);
$string = str_replace("\r","",$string);
$string = str_replace("\n","<br/>",$string);
$string = str_replace("|","&#166;",$string);
return ($string);
}
$nick = processing($nick);
$mail = processing($mail);
$site = processing($site);
$mess = processing($mess);
if (($pilih == "gb") || ($pilih == "pm")){
$fp = fopen ("brakakakawmJMGDMGJGtjagmMGDGDtphmgd.dat","a");
}
flock ($fp,2);
fputs ($fp,"$nick|$mail|$site|$jam|$mess|$tgl_site|$bln_site|$thn_site|$ua|$ip|$pilih|$via|$answ\r\n");
flock ($fp,3);
fclose ($fp);
//Matikan session
if ($fp){
unset($_SESSION['sgb_name']);
unset($_SESSION['sgb_mess']);
unset($_SESSION['sgb_mail']);
unset($_SESSION['sgb_site']);
unset($_SESSION['key']);
session_destroy();
Header('Location: ./index.php'); } }
$title="Tempat Nulis";
include "../moduls/header.php";
echo'<div class="row"><center>Isi pesan kamu di sini</center></div>';
if(isset($_SESSION['sgb_err'])){
print('<div class="menu"><center>'.$_SESSION['sgb_err']); unset($_SESSION['sgb_err']);
echo'</center></div>';
}
echo '<div class="iblock"><center>';
echo '<form action="" method="post">
* Nama (3 -15) :<br/>
<input name="nick" type="text" maxlength="18" size="16" ';
if(isset($_SESSION['sgb_name'])) print('value="'.$_SESSION['sgb_name'].'"');
print ' ""/><br/>
Email :<br/>
<input name="mail" type="text" maxlength="25" size="16" ';
if(isset($_SESSION['sgb_mail'])) print('value="'.$_SESSION['sgb_mail'].'"');
print ' ""/><br/>
Sites :<br/>
<input name="site" type="text" maxlength="30" size="16" ';
if(isset($_SESSION['sgb_site'])) print('value="'.$_SESSION['sgb_site'].'"');
print ' ""/><br/>
* Pesan (3 - 450) :<br/>
<textarea name="mess" cols="15" rows="3">';
if(isset($_SESSION['sgb_mess'])) print $_SESSION['sgb_mess'];
print '</textarea><br/>';
$key = mt_rand(10,99);
$_SESSION['key'] = $key;
echo '* Kode : '.$key.'<br/>
<input name="key" type="text" size="5" mini:hint="phone" value=""/><br/>';
echo 'Kirim Sebagai :<br/>
<select name="pilih">
<option value="gb">Publik Pesan</option>
<option value="pm">Pm Admin</option>
</select><br/>';
echo '<input name="send" type="submit" value="Kirim"/><br/><span style="color: #999999; font-weight: bold;">* Wajib diisi !</span>
</form>
</div>
<div class="menu">
&#171;&nbsp;<a href="index.php">Depan</a></div>';
include "../moduls/foot.php";
?>
