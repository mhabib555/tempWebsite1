<?php
include "../moduls/function.php";
$a = $_GET['a'];
$adminpass = $set[b];
if (isset($_GET['nom'])) { $nom = $_GET['nom']; } else { $nom = ''; }
if (isset($_GET['pass'])) { $pass = $_GET['pass']; } else { $pass = ''; }
if ($pass != $adminpass) { die('Password salah');
exit;
}
if ($a == "hapuz"){
include"sets.php";$fl = $datapesan;
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
Header('Location: ../gb.php?pass='.$pass.'');
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
Header('Location: ./teman.php?a=list&pass='.$pass.'');
}
}
fclose($fp);
exit;
}
if ($a == "hapuz_allgb"){
include'sets.php';
$hapuz = fopen("$datapesan","w+");
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
header("Location: ./teman.php?pass=".$pass);
exit;
}
?>
