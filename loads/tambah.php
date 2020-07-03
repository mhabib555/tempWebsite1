<?
include_once('ini.php');
$adminpass = $set[2];
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
$title="import upload";
@include_once('../moduls/header.php');
chmod('files/', 0777);
if ($pass == $adminpass){
echo '<form action="import.php?pass='.$pass.'" method=POST>
<div class="menu">Import<br /></div>
<div>url file yang mau di import:<br />
<input type=text value="http://" name=url></br>
masukan nama folder target dan nama filenya,folder yang sudah dibuatkan di ftp,misal files/opmin.jar atau upload/opmin.jar<br />
<input type=text value="files/"name=name><br />
<input type=submit value="import">
</form></div><div class="topdiv">upload</div><div>
<form action="upload.php?pass='.$pass.'" method="POST" enctype="multipart/form-data"><input type="file" name="file_name" size="10"><br/><input type="submit" value="upload"></form>';
}
else echo '<div class="menu"><form action="tambah.php?pass=$pass" method="get">
Anda wajib login terlebih dahulu<br/>Admin Password :<br/>
<input type="password" size="15" name="pass" value=""><br/>
<input type="submit" value="Login"></form>';
echo '</div>';
if ($pass == $adminpass){
echo '&raquo; <a href="./">keluar</a><br/>semua file masuk di dalam direktori <b>target</b> - ';
if(is_writeable($dir)){
echo '<span style="color:yellowgreen">ya</span><br />';
}else{
echo '<span style="color:red">tidak</span><br />';
}
if(file_exists($dir))
{
echo'Map <b>'.$dir.'</b> - <span style="color:yellowgreen">Sekarang</span>';
}else{
echo'Map <b>dan file yang diupload masuk di direktori upload</b> - <span style="color:red">Tidak ada</span>';
}
echo '</div> <a href="http://seupang.co.cc">seupang wap</a> Klik Masukkan / Login';
}
@include '../moduls/foot.php';
?>
