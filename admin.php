<?
require ('moduls/function.php');
$adminpass = $set[b];
if (isset($_GET['pass'])){
$pass = $_GET['pass'];
} else {
$pass = '';
}
$title="admin panel";
include "moduls/header.php";
echo'<div class="iblock1">
<center>panel situs</center></div>';
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
&raquo; <a href="admin.php">Kembali</a><br/>';
}
else if ($auth !== $adminpass){
echo 'Password salah !! <br/>
&raquo; <a href="admin.php?a=login">Kembali</a><br/>';
} else {
echo 'Login sukses !! <br/>
&raquo; <a href="admin.php?pass='.$adminpass.'">Ke depan</a><br/>';
}
break;
default:
echo '<form action="admin.php?a=login&amp;m=panel" method="post">
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
$file = 'moduls/function.php';
$e = $_GET['e'];
switch($e){
case "simpan":
$buka = fopen($file, 'w');
$konten='<?
$set[a]='.'"'."$_REQUEST[satu]".'";
$set[b]='.'"'."$_REQUEST[dua]".'";
$set[c]='.'"'."$_REQUEST[tiga]".'";
$set[d]='.'"'."$_REQUEST[empat]".'";
$set[e]='.'"'."$_REQUEST[lima]".'";
$set[f]='.'"'."$_REQUEST[enam]".'";
$set[g]='.'"'."$_REQUEST[tujuh]".'";
$set[h]='.'"'."$_REQUEST[delapan]".'";
$set[i]='.'"'."$_REQUEST[sembilan]".'";
$set[j]='.'"'."$_REQUEST[sepuluh]".'";
?>';
fwrite($buka, $konten);
fclose($buka);
echo 'Data situs telah di edit !!.<br/>
Jangan lupa dgn data yg baru.<br/>
&raquo; <a href="admin.php?pass='.$set[b].'">Kembali</a><br/>';
break;
default:
echo '<form action="admin.php?a=edit&amp;e=simpan&amp;pass='.$pass.'" method="post"><font color="red"><b>CATATAN</b></font> Hati hati dalam menambahkan code html,bisa menyebabkan wap menjadi blank,kalau itu terjadi kembalikan data ke awal dengan cara mengedit file moduls/function.php, via ftp <br/>
1). jumlah posting dibuku tamu :<br/>
<input type="text" name="satu" size="12" value="'.$set[a].'"><br/>
2). Admin Password :<br/>
<input type="text" name="dua" size="12" value="'.$set[b].'"><br/>
3). id publisher admob,jika tidak mau ada iklan nya kosongkan saja<br/>
<input type="text" name="tiga" size="12" value="'.$set[c].'"><br/>
4). url style css<br/>
<input type="text" name="empat" size="12" value="'.$set[d].'"><br/>
5). jumlah karakter di shout :<br/>
<input type="text" name="lima" size="12" value="'.$set[e].'"><br/>
6). description / keterangan situs :<br/>
<input type="text" name="enam" size="12" value="'.$set[f].'"><br/>
7). nama sapaan buat pengunjung:<br/>
<input type="text" name="tujuh" size="12" value="'.$set[g].'"><br/>
8). Url rss feed:<br/>
<input type="text" name="sembilan" size="12" value="'.$set[i].'"><br/>
9). footer / copyright:<br/>
<input type="text" name="delapan" size="12" value="'.$set[h].'"><br/>
10). Title situs:<br/>
<input type="text" name="sepuluh" size="12" value="'.$set[j].'"><br/><input type="submit" value="Edit"><br/>
</form>';
break;
} }
echo '</div>';
break;
default:
echo '<div class="row">';
if ($pass == $adminpass) {
echo '&raquo; <a href="/teman/teman.php?pass='.$pass.'">Tambah teman di home</a><br/>
&raquo; <a href="/teman/teman.php?a=list&amp;pass='.$pass.'">List teman di home</a><br/>
&raquo; <a href="admin.php?a=edit&amp;pass='.$pass.'">Edit data situs</a><br/>
&raquo; <a href="/bukutamu/teman.php?a=list&amp;pass='.$pass.'">List teman di bukutamu</a><br/>
&raquo; <a href="/bukutamu/teman.php?pass='.$pass.'">Tambah teman di bukutamu</a><br/>
&raquo; <a href="/status/admin.php?p='.$pass.'">Panel Status</a><br/>
&raquo; <a href="/shoutbox/admin.php?p='.$pass.'">Panel Shoutbox</a><br/>
&raquo; <a href="/loads/tambah.php?pass='.$pass.'">Panel Download</a><br/>
&raquo; <a href="admin.php?">Keluar</a><br/>';
} else {
echo 'silahkan klik <a href="admin.php?a=login">login</a> untuk mengakses penuh halaman ini';
}
echo '</div>';
break;
//Penutup
}
include "moduls/foot.php";
