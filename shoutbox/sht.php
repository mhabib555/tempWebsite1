<?php //editing scrip dari http://mymotto.110mb.com
//di edit lagi oleh http://seupang.Co.Cc
echo'<div class="iblock1"><a href="/shoutbox/"><font color="red"><b>SHOUT</b></a></font> | <a href="/smile.php"><font color="red"><b>SMILE</b></a></font> | <a href="/bb-code.php"><font color="red"><b>CODE</b></a></font></div>';
$c=intval(@$_GET['c']);
if(!isset($_SESSION['sgb_admp']))
ob_start();
// Membuka data gb
$arr=file(''.$data_shout.'');
$cnt=count($arr);
for($i=0;$i<$CONF['ns'];$i++){
if($c==$cnt) break;
$post=unserialize($arr[$c]);
// Hasil post pesan
$nama = $post['nick'];
$nama=strtolower($nama);
$jam = $post['time'];
$pesan = $post['text'];
include'pesan.php';
$browser = strtok($post['br'],' ');
$ip = $post['ip'];
$browser = str_replace('Nokia','NOK ',$browser);$browser = str_replace('SonyEricsson','SE ',$browser);
$browser = str_replace('Siemens','SIE ',$browser);
$browser = str_replace('Motorola','MOT ',$browser);
$browser = str_replace('/',' ',$browser);
$browser = str_replace('Opera','Op',$browser);
$browser = str_replace('Mozilla','Moz',$browser);
$hape = $post['hape'];
$hape = strtok($hape,'/');
$hape = str_replace('/',' ',$hape);
$hape = str_replace('Opera','Op',$hape);
$hape = str_replace('Mozilla','Moz',$hape);
$hape = str_replace('Nokia','NOK ',$hape);
$hape = str_replace('SonyEricsson','SE ',$hape);
$hape = str_replace('Siemens','SIE ',$hape);
$hape = str_replace('Motorola','MOT ',$hape);
if(isset($_SESSION['sgb_admp']))
include''.$link_pesan.'';
include'nama.php';
{
print'<div class="iblock"><div style="text-align:right">'.$jam.'</div><font color="red"><span style="text-shadow:black 0.10em 0.10em 0.10em"><b>'.$aran.'</span></font></b>: ';
print' '.$pesan.'<br />';
echo'<div style="text-align:right">'.$browser.' '.$hape.'</div>';
if(isset($post['answ']))
print'<b><font color="#ff0000">RE:</font></b> <font color="#ef00ff">'.$post['answ'].'</font></div></div>';
if(isset($_SESSION['sgb_admp'])) {
}else{
} }
echo'</div>';
$c++;
}
echo'<div class="iblock"><center>';
if($c>$CONF['ns']){
print('[<a href="?c='.($c-$CONF['ns']-$i).''.SID.'">&#171;</a>]|');
}else{
print'[&#171;]|';
}
if($c<$cnt){
print('|[<a href="?c='.$c.''.SID.'">&#187;</a>]<br />');
}else{
print'|[&#187;]<br />';
}
echo'</center></div>';
?>
