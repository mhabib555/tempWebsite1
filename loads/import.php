<?
include_once('ini.php');
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
$url = $_POST['url'];
$name = $_POST['name'];
if (copy($url,$name))
{
echo'<div class="topdiv">file terimport :)</div>';
echo'<div>File Info :</div>';
echo'<div3>Nama :  </div><span style="color:yellowgreen">';
echo $name ;
echo '</span>';
echo'<div3><br /></div>sumber file yang dicolong :   </div><span style="color:yellowgreen">';
echo $url ;
echo '</span><br/><a href="tambah.php?pass='.$pass.'">kembali</a>';
foot();
} else {
echo '<font color="red">Kesalahan! Dalam proses import <br/></font><a href="tambah.php?pass='.$pass.'">kembali</a>';
}
?>
