<?php //editing script oleh http://mymotto.110mb.com
require('../moduls/function.php');
require('shout.php');
$title="hapus pesan";
require('../moduls/header.php');

if(isset($_SESSION['sgb_admp']) && isset($_GET['clear'])){
$f=fopen('./motto.dat','w');
fclose($f);
echo('Message has been deleted.');
}elseif(isset($_SESSION['sgb_admp']) && isset($_GET['n'])){
$n=intval($_GET['n']);
$arr=file('./motto.dat');
unset($arr[$n]);
$f=fopen('./motto.dat','w');
$d=implode('',$arr);
fputs($f,$d);
fclose($f);
echo('Pesan telah di hapus.');
}else echo('Login dulu utk mengakses halaman ini!');
print('<br />[<a href="index.php'.psid().'">Shout</a>]</div>');
require('../moduls/foot.php');

?>
