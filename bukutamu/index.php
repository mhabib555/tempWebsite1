<?php
/*
* *
* Simple Guestbook g3ni Version 2.0
* Release : 10 Mei 2009
* Home : http://geen.kilu.de
* * *
*/
include "../moduls/function.php";
require ('inc/sets.php');
@include "./fnc.php";
$adminpass = $set[b];
$amount = $set[4];
$zona = $set[3];
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
$title="$set[5]";
include "../moduls/header.php";
echo'<div class="row">
<center>'.$set[6].'</center></div>';
$a = $_GET['a'];
switch($a){
case "login":
echo '<div class="iblock">
<center>';
$m = $_GET['m'];
switch($m){
case "panel":
$auth = $_POST['auth'];
if (empty($auth)){
echo 'Hayo mau masuk sembarang ye.. ? <br/>
&raquo; <a href="./">Kembali</a><br/>';
}
else if ($auth !== $adminpass){
echo 'Password salah !! <br/>
&raquo; <a href="./?a=login">Kembali</a><br/>';
} else {
echo 'Login sukses !! <br/>
&raquo; <a href="./?pass='.$adminpass.'">Ke depan</a><br/>';
}
break;
default:
echo '<form action="./?a=login&amp;m=panel" method="post">
Masukkan Password :<br/>
<input type="password" name="auth" value=""><br/>
<input type="submit" value="Login">
<br/></form>';
break;
}
echo '</center>
</div>';
break;
//Edit data
case "edit":
echo '<div class="iblock">';
if ($pass !== $adminpass){
echo 'Khusus admin';
} else {
$file = 'inc/sets.php';
$e = $_GET['e'];
switch($e){
case "simpan":
$buka = fopen($file, 'w');
$konten='<?
$set[1]='.'"'."$_REQUEST[satu]".'";
$set[2]='.'"'."$_REQUEST[dua]".'";
$set[3]='.'"'."$_REQUEST[tiga]".'";
$set[4]='.'"'."$_REQUEST[empat]".'";
$set[5]='.'"'."$_REQUEST[lima]".'";
$set[6]='.'"'."$_REQUEST[enam]".'";
?>';
fwrite($buka, $konten);
fclose($buka);
echo 'Data gb telah di edit !!.<br/>
Jangan lupa dgn data yg baru.<br/>
&raquo; <a href="./?pass='.$set[b].'">Kembali</a><br/>';
break;
default:
echo '<form action="./?a=edit&amp;e=simpan&amp;pass='.$pass.'" method="post">
Zona waktu :<br/>
<input type="text" name="tiga" size="12" value="'.$set[3].'"><br/>
Pesan tiap page :<br/>
<input type="text" name="empat" size="12" value="'.$set[4].'"><br/>
Title guestbook :<br/>
<input type="text" name="lima" size="12" value="'.$set[5].'"><br/>
Kata pembuka :<br/>
<input type="text" name="enam" size="12" value="'.$set[6].'"><br/>
<input type="submit" value="Edit"><br/>
</form>';
break;
} }
echo '</div>';
break;
//Page utama
default:
echo '<div class="menu_razd">
<center>
<a href="./add.php">Tulis</a> | ';
if ($pass == $adminpass){
echo '<a href="./index.php?pass='.$pass.'">Fresh</a><br/>';
} else {
echo '<a href="./index.php">Fresh</a><br/>';
}
echo '</center></div>';
$array = file('brakakakawmJMGDMGJGtjagmMGDGDtphmgd.dat');
$count = count($array);
$list  = $amount;
if (empty($_GET['page'])) {
$page = 1;
} else {
$page = (int) $_GET['page'];
}

$j = ($count-1)-(($page-1)*$list);
$i = $j-$list;
for(; $i<$j && $j>=0; $j--) {
$up = $j + 1;
$text = explode("|",$array[$j]);
$text[0] = GantiNama($text[0]);
$text[4] = GantiPesan($text[4]);
// Mulai data waktu
$wap = mktime(0, 0, 0, $text[6], $text[5], $text[7]);
$sekarang = mktime(0, 0, 0, date("m", time() + ($zona * 3600)), date("j", time() + ($zona * 3600)), date("y", time() + ($zona * 3600)));
if ($wap == $sekarang){
$el = "[Hari ini | $text[3]]";
}
else if ($wap == ($sekarang - (24*60*60))){
$el = "[Kemaren | $text[3]]";
}
else if ($wap == ($sekarang - (48*60*60))){
$el = "[2 hari yg lalu | $text[3]]";
}
else {
$el = "[$text[5].$text[6].$text[7] | $text[3]]";
}
echo '<div class="aut"><center>'.$el.'</center></div>';
if (($text[10] == "pm") && ($pass !== $adminpass)){
echo '<div class="iblock"><center><form action="index.php" method="get"><b>Pesan Pribadi</b><br/><input type="password" name="pass" value=""><br/>
<input type="submit" value="BUKA"></center></div></form>';
} else {
echo '<div class="iblock1"><center><b>'.$text[0].'</b></center></div>';
echo'<div class="iblock"> '.$text[4].'</div>';
//Mulai data reply
if ($text[12] != "\r\n") {
echo '<div class="menu"><font color="#ff6633">RE : '.$text[12].'</font></div>'; }
if ($text[11] != "emboeh") {
echo '<div class="row">Konek : '.$text[11].'</div>'; }
echo '<div class="row">';
if ($text[1] != '') { echo 'Email : '.$text[1].'<br/>';
}
if($text[2] != '') { echo 'Sites : <a href="'.$text[2].'/">'.$text[2].'</a><br/>';
}
include'./provider.php';
echo'UA: '.$text[8].'<br/>';
echo 'IP: '.$text[9].'</div>';
}
if ($pass == $adminpass) {
echo '<a href="del.php?a=hapuz&amp;nom='.$up.'&amp;pass='.$pass.'">Hapuz</a> | <a href="edit.php?b=gb&amp;nom='.$up.'&amp;pass='.$pass.'">Edit</a><br/>';
}
echo "</div>";
}
echo '<div class="iblock1">
<center>';
if ($page > 1){
if ($pass == $adminpass){
echo "<b>[<a href=\"./index.php?pass=".$pass."&amp;page=".($page-1)."\">&lt;&lt;</a>]</b> ";
} else {
echo "<b>[<a href=\"./index.php?page=".($page-1)."\">&lt;&lt;</a>]</b> ";
}
} else {
echo "<b>[&lt;&lt;]</b> ";
}
$all = ceil($count/$list);
if ($all >= 5){
$tmp = 5;
} else {
$tmp = $all;
}
for ($i=1;$i<=$tmp;$i++) {
if ($page==$i) {
echo '['.$i.'] ';
} else {
if ($pass == $adminpass){
echo '<a href="'.$_SERVER['PHP_SELF'].'?pass='.$pass.'&amp;page='.$i.'">'.$i.'</a> ';
} else {
echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'">'.$i.'</a> ';
}
}
}
//Next page
if ($page < $all){
if ($pass == $adminpass){
echo " <b>[<a href=\"./index.php?pass=".$pass."&amp;page=".($page+1)."\">&gt;&gt;</a>]</b>";
} else {
echo " <b>[<a href=\"./index.php?page=".($page+1)."\">&gt;&gt;</a>]</b>";
}
}
else {
echo ' <b>[&gt;&gt;]</b>';
}
echo "<br/>";
if ($count != 0){
echo "[$page/$all/$count]<br/>";
}
if ($all > 1){
if ($pass == $adminpass){
echo '<form action="./?pass='.$pass.'" method="get">';
} else {
echo '<form action="./" method="get">';
}
?>
<input size="2" name="page" value="<?php echo $page; ?>" style="-wap-input-format:'*N'" />
<?
if ($pass == $adminpass){
echo '<input type="hidden" name="pass" value="'.$pass.'" />';
}
?>
<input type="submit" value="Jump!!" /></form>
<?
}
echo "</center></div>";
echo '<div class="row">';
if ($pass == $adminpass) {
echo '&raquo; <a href="teman.php?pass='.$pass.'">Tambah teman</a><br/>
&raquo; <a href="teman.php?a=list&amp;pass='.$pass.'">List teman</a><br/>
&raquo; <a href="./?a=edit&amp;pass='.$pass.'">Edit data</a><br/>
&raquo; <a href="del.php?a=hapuz_allgb&amp;pass='.$pass.'">Hapuz Semua Gb</a><br/>
&raquo; <a href="del.php?a=hapuz_allteman&amp;pass='.$pass.'">Hapuz Semua Teman</a><br/>
&raquo; <a href="./">Keluar</a><br/>';
} else {
echo '<center><a href="./?a=login">Panel</a> | <a href="./add.php">Tulis</a></center>';
}
echo '</div>';
break;
//Penutup
}
include "../moduls/foot.php";
?>
