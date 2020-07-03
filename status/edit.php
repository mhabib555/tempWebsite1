<?php
/*
Modified by : Cahd3so
Home : http://Cahd3so.net
di edit lagi ole ade
home http://seupang.co.cc
* * *
*/
require'./cfg.php';
$n=intval(@$_GET['n']);
Header('Cache-Control: no-cache, must-revalidate');
$title="edit";
include "../moduls/header.php";
if(!isset($_SESSION['shout_adm'])) die('<div class="menu">Login dulu, atau sessi telah expired.<br /></div>');
require('./smiles.php');
$arr=file($int);
$post=unserialize($arr[$n]);
if(isset($_POST['nick_shout']) && isset($_POST['text_shout'])){
$nick_shout=safe_var($_POST['nick_shout']);
$text_shout=safe_var($_POST['text_shout'],true);
if(empty($nick_shout) || empty($text_shout)) die('Wew, <i>Nama atau pesan koq kosong?</i></div>');
if(isset($_POST['answ'])){
if(!empty($_POST['answ'])) $post['answ']=safe_var($_POST['answ']);
elseif(isset($post['answ'])) unset($post['answ']);
}
$text_shout=str_replace($sstr,$simg,$text_shout);
$pesan_shout=preg_replace("#\[img\](.*?)\[/img\]#", "<img src=\"\\1\">", $pesan_shout);
$pesan_shout = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\">\\2</a>", $pesan_shout);
$pesan_shout = preg_replace("#(^|[\n ])((www|wap)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\">\\2</a>", $pesan_shout);
$pesan_shout=preg_replace("#\[b\](.*?)\[/b\]#","<b>\\1</b>",$pesan_shout);
$pesan_shout=preg_replace("#\[marq\](.*?)\[/marq\]#","<marquee>\\1</marquee>",$pesan_shout);
$pesan_shout=preg_replace("#\[marq\](.*?)\[/marq\]#","<marquee>\\1</marquee>",$pesan_shout);
$pesan_shout=preg_replace("#\[big\](.*?)\[/big\]#","<span style='font-size:large;'>\\1</span>",$pesan_shout);
$pesan_shout=preg_replace("#\[das\](.*?)\[/das\]#","<span style='border:1px dashed;'>\\1</span>",$pesan_shout);
$pesan_shout=preg_replace("#\[in\](.*?)\[/in\]#","<input type='text' value='\\1'/>",$pesan_shout);
$pesan_shout=preg_replace("#\[kode\](.*?)\[/kode\]#",htmlentities("\\1"),$pesan_shout);
$pesan_shout=preg_replace("#\[u\](.*?)\[/u\]#", "<u>\\1</u>", $pesan_shout);
$pesan_shout=preg_replace("#\[i\](.*?)\[/i\]#", "<i>\\1</i>",$pesan_shout);
$pesan_shout=preg_replace("#\[blink\](.*?)\[/blink\]#","<blink>\\1</blink>",$pesan_shout);
$pesan_shout=str_replace("[br/]","<br/>", $pesan_shout);
$pesan_shout=preg_replace("#\[color=(.*?)\](.*?)\[/color\]#","<font color=\\1>\\2</font>",$pesan_shout);
$pesan_shout=preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#","\\1<a href=\"\\2\">\\2</a>", $pesan_shout);
$pesan_shout=preg_replace("#\[url=(.*?)\](.*?)\[/url\]#","<a href=\"\\1\">\\2</a>", $pesan_shout);
$post['nick_shout']=$nick_shout;
$post['text_shout']=$text_shout;
$arr[$n]=serialize($post)."\n";
$f=fopen($int,'w');
fputs($f,implode('',$arr));
fclose($f);
echo('<div class="row"><center><b>Status sukses...! di ubah</b></center></div>');
}else{
require('./smiles.php');
$post['text_shout']=str_replace($simg,$sstr,$post['text_shout']);
$post['answ']=str_replace($simg,$sstr,$post['answ']);
if(!isset($post['answ'])) $post['answ']=null;
echo('<div class="iblock1"><b>ADMIN STATUS</b></div><div class="row"><form action="'.$_SERVER['PHP_SELF'].'?n='.$n.'&'.SID.'" method="post"><font color="olive"><b>Judul status</b></font><br/>
<input type="text" name="nick_shout" size="12" value="'.$post['nick_shout'].'" maxlength="20" /><br /><font color="olive"><b>STATUS</b></font><br />
<textarea name="text_shout" rows="2" cols="20">'.strip_tags($post['text_shout']).'</textarea><br />
<input type="submit" value="ENTER" />
</form></center></div>');
}
print('<div class="iblock"><a href="./"><font color="#ff8000"><b>Kembali</font></b></a></font></div>');
include "../moduls/foot.php";
?>
