<?php
/*
Simple admin on of
Modified by : Cahd3so
Home : http://cahd3so.net
edit lagi oleh ade
home http://seupang.co.cc
* * *
*/
require'./cfg.php';
$title="admin";
include "../moduls/header.php";
if(isset($_GET['p'])){
if($_GET['p']==$pass){
$_SESSION['shout_adm']=true;
print('<div class="menu"><font color="#ff8000"><b>Login Sukses...!</b> </font><br/>[<a href="./index.php?n='.$c.'&amp;'.SID.'">MASUK</a>]</div>');
}else print('<div class="row"><center>Password salah!<br />[<a href="'.$_SERVER['PHP_SELF'].'">ULANG</a>]</center></div>');
}else print('<div class="iblock"><font color="#ff8000"><b>Masukkan Kata Sandi</b></font></div><div class="row"><form action="'.$_SERVER['PHP_SELF'].'" method="get">
<input type="password" name="p" size="12" /><br />
<input type="submit" value="LOGIN" />
</form>
</center></div>');
include "../moduls/foot.php";
?>
