<?php
include "../moduls/function.php";
require ('inc/sets.php');
$adminpass = $set[b];
$amount = 7;
if (isset($_GET['nom'])){
$nom = $_GET['nom'];
} else {
$nom = '';
}
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
if ($pass != $adminpass){
die('Kusus admin');
}
else {
$andy=mt_rand(1,10);
$title="teman";
require '../moduls/header.php';
echo'<div class="iblock1"><center>Khusus Admin</center></div>';
$a = $_GET['a'];
switch($a){
case "kirim":
echo '<div class="row"><center>';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$judul = $_POST['judul'];
$spasi = $_POST['spasi'];
if (($nama == '') || ($alamat == '') || ($judul == '')){
echo "Semua kolom haruz di isi !! <br/>";
}
else if (preg_match("/http(s)?:\/\//i", $alamat)){
echo 'Mau Ngeyel ye? Udh di bilang URL site gak buleh pake http://';
}
else if (preg_match("/:\/\//i", $alamat)){
echo 'Jitax!! URL site gak buleh pake http://';
} else {
$fp = fopen("teman.dat","a");
flock($fp,2);
fputs($fp,"$nama|http://$alamat|$judul|$spasi\r\n");
flock($fp,3);
fclose($fp);
echo "Teman telah di tambahkan <br/><a href=./teman.php?a=list&amp;pass=$pass>[List Teman]</a>";
}
echo '</div></div>';
break;
case "list":
echo '<div class="row">';
$array = file('teman.dat');
$count = count($array);
$list  = $amount; //list per page
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
echo "Nama : ".$text[0]."<br/>
Alamat : ".$text[1]."<br/>
Julukan : ".$text[2]."<br/>";
echo '<a href="del.php?a=hapuz_teman&amp;nom='.$up.'&amp;pass='.$pass.'">Hapuz</a><hr>';
}
if ($page > 1){
echo "</div><div class=\"row\"><b>[<a href=\"./teman.php?a=list&amp;pass=".$pass."&amp;page=".($page-1)."\">&lt;&lt;</a>]</b> ";
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
echo '<a href="'.$_SERVER['PHP_SELF'].'?a=list&amp;pass='.$pass.'&amp;page='.$i.'">'.$i.'</a> ';
}
}
//Next page
if ($page < $all){
echo " <b>[<a href=\"./teman.php?a=list&amp;pass=".$pass."&amp;page=".($page+1)."\">&gt;&gt;</a>]</b>";
}
else {
echo ' <b>[&gt;&gt;]</b>';
}
echo "<br/>";
if ($count != 0){
echo "[$page/$all/$count]<br/>";
}
echo '&raquo; <a href="'.$_SERVER['PHP_SELF'].'?pass='.$pass.'">Tambah teman</a><br/>&raquo; <a href="./?pass='.$pass.'">kedepan</a>';
echo '</div></div>';
break;
default:
echo '<div class="row"><center>[<a href=./teman.php?a=list&amp;pass='.$pass.'>List Teman</a>]</center></div></div><div class="row">';
echo '<form action="'.$_SERVER['PHP_SELF'].'?a=kirim&amp;pass='.$pass.'" method="post">
* Nama : <br/>
<input type="text" name="nama" size="12" value=""><br/>
* Alamat (tanpa http://) : <br/>
<input type="text" name="alamat" size="12" value=""><br/>
* Julukan : <br/>
<input type="text" name="judul" size="12" value=""><br/>
<input type="hidden" name="spasi" value="oke">
<input type="submit" value="Tambah"><br/>
</form>';
echo '</div></div></div></div></div>';
break;
}
require '../moduls/foot.php';
//Penutup
}
?>
