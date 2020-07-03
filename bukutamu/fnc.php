<?php
/*
* *
* Simple Guestbook g3ni Version 2.0
* Release : 10 Mei 2009
* Home : http://geen.kilu.de
* * *
*/
function GantiNama($temanku){
$data_teman = file("teman.dat");
$total_teman = count($data_teman);
for($z = 0; $z < $total_teman; $z++){
$teman = explode("|", $data_teman[$z]);
$temanku = str_ireplace("$teman[0]","".$teman[0]." [<a href=\"$teman[1]\">".$teman[2]."</a>]", $temanku);
}
//Tambah data teman spesial km di sini
$temanku = str_replace("kosong", "<b>kosong</b>", $temanku);
return $temanku;
}
function GantiPesan($pesan){
$pesan = preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#is", "\\1<a href=\"\\2\">\\2</a>", $pesan); $pesan = preg_replace("#(^|[\n ])((www|wap)\.[^ \"\t\n\r<]*)#is", "\\1<a href=\"http://\\2\">\\2</a>", $pesan);
$pesan=preg_replace("#\[b\](.*?)\[/b\]#","<b>\\1</b>",$pesan);
$pesan=preg_replace("#\[marq\](.*?)\[/marq\]#","<marquee>\\1</marquee>",$pesan);
$pesan=preg_replace("#\[marq\](.*?)\[/marq\]#","<marquee>\\1</marquee>",$pesan);
$pesan=preg_replace("#\[big\](.*?)\[/big\]#","<span style='font-size:large;'>\\1</span>",$pesan);
$pesan=preg_replace("#\[das\](.*?)\[/das\]#","<span style='border:1px dashed;'>\\1</span>",$pesan);
$pesan=preg_replace("#\[in\](.*?)\[/in\]#","<input type='text' value='\\1'/>",$pesan);
$pesan=preg_replace("#\[kode\](.*?)\[/kode\]#",htmlentities("\\1"),$pesan);
$pesan=preg_replace("#\[u\](.*?)\[/u\]#", "<u>\\1</u>", $pesan);
$pesan=preg_replace("#\[i\](.*?)\[/i\]#", "<i>\\1</i>",$pesan);
$pesan=preg_replace("#\[blink\](.*?)\[/blink\]#","<blink>\\1</blink>",$pesan);
$pesan=str_replace("[br/]","<br/>", $pesan);
$pesan=preg_replace("#\[color=(.*?)\](.*?)\[/color\]#","<font color=\\1>\\2</font>",$pesan);
$pesan=preg_replace("#(^|[\n ])([\w]+?://[^ \"\n\r\t<]*)#","\\1<a href=\"\\2\">\\2</a>", $pesan);
$pesan=preg_replace("#\[url=(.*?)\](.*?)\[/url\]#","<a href=\"\\1\">\\2</a>", $pesan);
$pesan = str_replace("ade","<a href=\"http://seupang.tk\"><font color=\"red\">ade</font></a>", $pesan);
$pesan = str_replace(":*","<img src='/tema/sm/1.gif' alt=':*'>", $pesan);
$pesan = str_replace("=))","<img src='/tema/sm/2.gif' alt='=))'>", $pesan);
$pesan = str_replace(":-))","<img src='/tema/sm/3.gif' alt=':-))'>", $pesan);
$pesan = str_replace(":)","<img src='/tema/sm/4.gif' alt=':)'>", $pesan);
$pesan = str_replace(":-((","<img src='/tema/sm/5.gif' alt=':-(('>", $pesan);
$pesan = str_replace(";)","<img src='/tema/sm/6.gif' alt=';)'>", $pesan);
$pesan = str_replace(":p","<img src='/tema/sm/7.gif' alt=':p'>", $pesan);
$pesan = str_replace(":(","<img src='/tema/sm/8.gif' alt=':('>", $pesan);
$pesan = str_replace(":D","<img src='/tema/sm/9.gif' alt=':D'>", $pesan);
$pesan = str_replace(":d","<img src='/tema/sm/9.gif' alt=':d'>", $pesan);
$pesan = str_replace(":o","<img src='/tema/sm/10.gif' alt=':o'>", $pesan);
$pesan = str_replace("bodem","<img src='http://seupang.tk/shoutbox/sm/bodem.gif' alt='bodem'>", $pesan);
$pesan = str_replace("bokong","<img src='http://seupang.tk/shoutbox/sm/bokong.gif' alt='bokong'>", $pesan);
$pesan = str_replace("bubuk","<img src='http://seupang.tk/shoutbox/sm/bubuk.gif' alt='bubuk'>", $pesan);
$pesan = str_replace("ckaka","<img src='http://seupang.tk/shoutbox/sm/ckaka.gif' alt='ckaka'>", $pesan);
$pesan = str_replace("dongkol","<img src='http://seupang.tk/shoutbox/sm/dongkol.gif' alt='dongkol'>", $pesan);
$pesan = str_replace("download","<img src='http://seupang.tk/shoutbox/sm/download.gif' alt='download'>", $pesan);
$pesan = str_replace("goodluck","<img src='http://seupang.tk/shoutbox/sm/goodluck.gif' alt='goodluck'>", $pesan);
$pesan = str_replace(":he","<img src='http://seupang.tk/shoutbox/sm/he.gif' alt=':he'>", $pesan);
$pesan = str_replace("help","<img src='http://seupang.tk/shoutbox/sm/help.gif' alt='help'>", $pesan);
$pesan = str_replace("huahaha","<img src='http://seupang.tk/shoutbox/sm/huahaha.gif' alt='huahaha'>", $pesan);
$pesan = str_replace("huh","<img src='http://seupang.tk/shoutbox/sm/huh.gif' alt='huh'>", $pesan);
$pesan = str_replace("mumet","<img src='http://seupang.tk/shoutbox/sm/mumet.gif' alt='mumet'>", $pesan);
$pesan = str_replace("minum","<img src='http://seupang.tk/shoutbox/sm/minum.gif' alt='minum'>", $pesan);
$pesan = str_replace("ngopi","<img src='http://seupang.tk/shoutbox/sm/ngopi.gif' alt='ngopi'>", $pesan);
$pesan = str_replace("nguli","<img src='http://seupang.tk/shoutbox/sm/nguli.gif' alt='nguli'>", $pesan);
$pesan = str_replace("pentung","<img src='http://seupang.tk/shoutbox/sm/pentung.gif' alt='pentung'>", $pesan);
$pesan = str_replace("rok","<img src='http://seupang.tk/shoutbox/sm/rok.gif' alt='rok'>", $pesan);
$pesan = str_replace("salaman","<img src='http://seupang.tk/shoutbox/sm/salaman.gif' alt='salaman'>", $pesan);
$pesan = str_replace("sip","<img src='http://seupang.tk/shoutbox/sm/sip.gif' alt='sip'>", $pesan);
$pesan = str_replace("modol","<img src='http://seupang.tk/shoutbox/sm/modol.gif' alt='modol'>", $pesan);
$pesan = str_replace("mOdOl","<img src='http://seupang.tk/shoutbox/sm/modol.gif' alt='mOdOl'>", $pesan);
$pesan = str_replace(":spam","<img src='http://seupang.tk/shoutbox/sm/spam.gif' alt='spam'>", $pesan);
$pesan = str_replace("udut","<img src='http://seupang.tk/shoutbox/sm/udut.gif' alt='udut'>", $pesan);
$pesan = str_replace("welcome","<img src='http://seupang.tk/shoutbox/sm/welcome.gif' alt='welcome'>", $pesan);
$pesan = str_replace("masta"," ", $pesan);
$pesan = str_replace("Masta"," ", $pesan);
$pesan = str_replace("MASTA"," ", $pesan);
$pesan = str_replace("mazta"," ", $pesan);
$pesan = str_replace("master"," ", $pesan);
$pesan = str_replace("Master"," ", $pesan);
$pesan = str_replace("MASTER"," ", $pesan);
$pesan = str_replace("mazter"," ", $pesan);
$pesan = str_replace("anjing","*", $pesan);
$pesan = str_replace("bego","*", $pesan);
$pesan = str_replace("babi","*", $pesan);
$pesan = str_replace("kunyuk","*", $pesan);
$pesan = str_replace("ngentot","*", $pesan);
$pesan = str_replace("ngewe","*", $pesan);
$pesan = str_replace("itil","*", $pesan);
$pesan = str_replace("tumbung","*", $pesan);
$pesan = str_replace("bangsat","*", $pesan);
$pesan = str_replace("luh","*", $pesan);
$pesan = str_replace("tai","*", $pesan);
$pesan = str_replace("ketek","*", $pesan);
return $pesan;
}
?>
