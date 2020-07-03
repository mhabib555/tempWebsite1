<?php
/*
////////////////////////////////////
Author : EuroDesigN;
ICQ    : 72-78-310;
All Rights Reserved;
R329652219239;
////////////////////////////////////
*/
error_reporting(0); //P.S Aku tidak Championship dotuplyu tanpa dia ada kesalahan, tetap
include_once("ini.php");
$adminpass = $set[2];
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
die('halaman terlarang');
}
echo $style;
if($_FILES["file_name"]["error"] == 0 &&
$_FILES["file_name"]["size"] > 0) {
$path = 'upload/';
$path .= basename($_FILES["file_name"]["name"]);
if (@move_uploaded_file($_FILES["file_name"]["tmp_name"], $path)) {
echo' <div class="topdiv">file sukses terupload :)</div>';
echo'<div>File Info :</div>';
echo'<div3>nama file :   </div>';
echo $_FILES["file_name"]["tmp_name"];
echo'<div3><br />Ukuran :   </div>';
echo $_FILES["file_name"]["size"];
echo'<div3><br />Katalog Download :   </div>';
echo $_FILES["file_name"]["tmp_name"];
echo'<div3><br />Filetype :   </div>';
echo $_FILES["file_name"]["type"];
echo'<div3><br />Kesalahan :   </div>';
echo $_FILES["file_name"]["error"];
echo'<br/><a href="tambah.php?pass='.$pass.'">kembali</a>';
foot();
}
else {
echo'<font color="red">Kesalahan! Dalam upload file</font><br/><a href="tambah.php?pass='.$pass.'">kembali</a>';
foot();
}
}
else echo'<font color="red">Kesalahan! Dalam upload file</font><br/><a href="tambah.php?pass='.$pass.'">kembali</a>';
?>
