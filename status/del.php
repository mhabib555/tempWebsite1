<?php
/*
Simple shoutbox menggunakan session id.
Modified by : g3ni
Home : http://g3ni.kilu.de
* * *
*/
require './cfg.php';
$title="hapus pesan";
include"../moduls/header.php";
if(isset($_SESSION['shout_adm']) && isset($_GET['clear'])){
$f=fopen($int,'w');
fclose($f);
echo('Semua pesan telah di hapus.');
}elseif(isset($_SESSION['shout_adm']) && isset($_GET['n'])){
$n=intval($_GET['n']);
$arr=file($int);
unset($arr[$n]);
$f=fopen($int,'w');
$d=implode('',$arr);
fputs($f,$d);
fclose($f);
echo('Pesan telah di hapus.');
}else echo('Login dulu utk mengakses halaman ini!');
print '<div class="menu"><center><a href="./'.psid().'">Kembali</a></center></div>';
include"../moduls/foot.php";
?>
