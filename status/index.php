<?php
/*
Sebelum melakukan pengeditan, bacalah Panduan.txt terlebih dahulu.
*/
require "./cfg.php";
$arr = file($int);
if(isset($_POST['nick_shout']) && isset($_POST['text_shout'])){
function shit_happened($shit='Unknown error'){
$_SESSION['sgb_err']=$shit;
Header('Location: ./?a=nyerat'.psid());
exit;
}
$data['nick_shout']=safe_var($_POST['nick_shout']);
$data['text_shout']=safe_var($_POST['text_shout'],true);
$data['time']=$wib;
$data['br']=safe_var($_SERVER['HTTP_USER_AGENT']);
$data['browlocal']=safe_var($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']);
$data['ipshout']=safe_var($_SERVER['REMOTE_ADDR']);
$data['ipshoutlocal']=safe_var($_SERVER['HTTP_X_FORWARDED_FOR']);
$tr=@$_POST['tr'];
$data['hasil']=safe_var($_POST['hasil']);
if(!isset($_SESSION['sgb_name']) or $_SESSION['sgb_name']!=$data['nick_shout']) $_SESSION['sgb_name']=$data['nick_shout'];
if(!isset($_SESSION['sgb_pesan']) or $_SESSION['sgb_pesan']!=$data['text_shout']) $_SESSION['sgb_pesan']=$data['text_shout'];
if(empty($data['nick_shout']) || empty($data['text_shout'])) shit_happened('Hayo!! Nama atau Pesan kudu di isi!');
if(strlen($data['nick_shout'])>15) shit_happened('Nama gak blh lebih dari 15 karakter.');
if(strlen($data['nick_shout'])<3) shit_happened('Nama gak blh kurang dari 3 karakter.');
if(strlen($data['text_shout'])<5) shit_happened('Pesen nya gak blh kurang dari 5 karakter sayangg! Ckakak..');
if(strlen($data['text_shout'])>500) shit_happened('Sabar2, pesan gak blh lbh dari 500 karakter!');
if(empty($data['hasil'])) shit_happened('Wew, Sign up kode  kok masih kosong?');
if($_POST['kode']!=$_POST['hasil']) shit_happened('Nulisnya yg bener duonk! Sign up kode salah tuwh!');
$cntt=count($arr);
if($cntt>0){
$post=unserialize($arr[0]);
if($data['text_shout']==$post['text_shout']) shit_happened('dilarang mengulang pesan yang sama');
}
require('./smiles.php');
$data['text_shout']=str_replace($sstr,$simg,$data['text_shout']);
if($cntt>$CONF['np']) unset($arr[$cntt-1]);
$f = fopen($int, 'w');
fputs($f,serialize($data)."\n".implode('',$arr));
fclose($f);
header('Location: ./'.psid());
}else{
ob_start();
$title="admin status";
include "../moduls/header.php";
$cc=intval(@$_GET['cc']);
// Membuka data shout
$arr=file($int);
$cn=count($arr);
for($i=0;$i<5;$i++){
if($cc==$cn) break;
$post=unserialize($arr[$cc]);
// Hasil post pesan
$nama_shout = $post['nick_shout'];
$pesan_shout = $post['text_shout'];
$jam = $post['time'];
require('pesan.php');
echo'<div class="iblock1"><font color="red"><b>'.$nama_shout.'</b></font> '.$jam.'</div>';
if (strlen($pesan_shout) > 1000){
print substr($pesan_shout, 0, 45).'....<br />';
}else{
print '<div class="menu">'.$pesan_shout.'</div>';
}
$cc++;
}
if ($cn == 0) {
echo 'Belum ada pesan status!';
}
echo'</div>';
function form_nyerat(){
echo '<div class="menu">';
if(isset($_SESSION['sgb_err'])){
print('<center>'.$_SESSION['sgb_err']); unset($_SESSION['sgb_err']);
echo'</center></div>';
}
if(isset($_SESSION['shout_adm'])){
print'<center>buat status baru</center>';
echo '</div>';
print('<div class="row"><center>
<form action="./'.psid().'" method="post">
* Judul status:<br />
<input type="text" name="nick_shout" maxlength="50" size="12" ');
if(isset($_SESSION['sgb_name'])) print('value="'.$_SESSION['sgb_name'].'"');
print(' /><br />
* Pesan status:<br />
<textarea name="text_shout" rows="3" cols="15">');
if(isset($_SESSION['sgb_pesan'])) print $_SESSION['sgb_pesan'];
print('</textarea><br />');
$key = rand(10,99);
echo'<input type="hidden" name="kode" readonly value="'.$key.'">
<input type="hidden"     name="hasil" size="8" class="number" maxlength="5" value="'.$key.'">';
print('
<input type="submit" value="simpan" /><br />
</form>
* All required</center>
</div>');
}}
function logout(){
session_destroy();
header("Location: ./");
}
$a = $_GET['a'];
switch ($a){
case "nyerat":
form_nyerat();
break;
case "keluar":
logout();
break;
default:
@include "./main.php";
break;
}
echo '</div>';
ob_end_flush();
}
include"../moduls/foot.php";
?>
