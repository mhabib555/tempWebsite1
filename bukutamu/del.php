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
$a = $_GET['a'];
$adminpass = $set[b];
if (isset($_GET['nom'])) { $nom = $_GET['nom']; } else { $nom = ''; }
if (isset($_GET['pass'])) { $pass = $_GET['pass']; } else { $pass = ''; }
if ($pass != $adminpass) { die('Password salah');
exit;
}
if ($a == "hapuz"){
$fl = 'brakakakawmJMGDMGJGtjagmMGDGDtphmgd.dat';
$line = $nom;
$file = file($fl);
$count = count($file);
$fp = fopen($fl,"w");
for($i=0;$i<$count;$i++)
{
if($i!=$line-1)
{
fwrite($fp,$file[$i]);
}
else
{
Header('Location: ./index.php?pass='.$pass.'');
}
}
fclose($fp);
exit;
}
if ($a == "hapuz_shout"){
$fl = 'shout.dat';
$line = $nom;
$file = file($fl);
$count = count($file);
$fp = fopen($fl,"w");
for($i=0;$i<$count;$i++)
{
if($i!=$line-1)
{
fwrite($fp,$file[$i]);
}
else
{
Header('Location: ./index.php?pass='.$pass.'');
}
}
fclose($fp);
exit;
}
if ($a == "hapuz_teman"){
$fl = 'teman.dat';
$line = $nom;
$file = file($fl);
$count = count($file);
$fp = fopen($fl,"w");
for($i=0;$i<$count;$i++)
{
if($i!=$line-1)
{
fwrite($fp,$file[$i]);
}
else
{
Header('Location: ./index.php?pass='.$pass.'');
}
}
fclose($fp);
exit;
}
if ($a == "hapuz_allgb"){
$hapuz = fopen("brakakakawmJMGDMGJGtjagmMGDGDtphmgd.dat","w+");
header("Location: ./?pass=".$pass);
exit;
}
if ($a == "hapuz_allshout"){
$hapus = fopen("shout.dat","w+");
header("Location: ./?pass=".$pass);
exit;
}
if ($a == "hapuz_allteman"){
$hapuss = fopen("teman.dat","w+");
header("Location: ./?pass=".$pass);
exit;
}
?>
