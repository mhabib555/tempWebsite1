<?php
include "../moduls/function.php";
// Mulai utk online user
class online {
var $count;
var $arr;
var $indata;
var $path='./online.dat'; // tempat data online
function online(){
$this->indata[0]=strtok($_SERVER['HTTP_USER_AGENT'],' ');
$this->indata[1]=$_SERVER['REMOTE_ADDR'];
$this->indata[2]=time();
$this->arr=file($this->path);
$this->cnt=count($this->arr);
$t=time() - 300; // Reset waktu online
for($i=0;$i<$this->cnt;$i++){
$a=unserialize($this->arr[$i]);
if($a[2] < $t){
unset($this->arr[$i]);
$this->cnt--;
}
}
}
function add(){
foreach($this->arr as $key=>$val){
$a=unserialize($val);
if($a[0]==$this->indata[0] && $a[1]==$this->indata[1]){
unset($this->arr[$key]);
$this->cnt--;
break;
}
}
$f=fopen($this->path,'w');
fputs($f,serialize($this->indata)."\n".implode('',$this->arr));
fclose($f);
$this->cnt++;
}
}

// Fungsi utk SID
function psid(){
return (SID) ? ('?'.SID) : null;
}

// Function
function safe_var($str,$brl=false){
$str=trim(stripslashes(htmlspecialchars($str)));
if($brl) $str=nl2br($str);
$str=strtr($str,array("\r"=>' ',"\n"=>' '));
return $str;
}

$g3ni = '6';
$tang =date("j.m.y",time()+($g3ni*3600));
$jam =date("H:i",time()+($g3ni*3600));
$t=date("Y",time()+($g3ni*3600));
$h=date("z",time()+($g3ni*3600));
$jum=(($t-1)*365)
+(int)(($t-1)/4)+$h;
$di=7*(int)($jum/7);
$dino=$jum-$di;
$pas=5*(int)($jum/5);
$pasar=$jum-$pas;
$dino=str_replace("6","Sabtu",$dino);
$dino=str_replace("0","Ahad",$dino);
$dino=str_replace("1","Senin",$dino);
$dino=str_replace("2","Selasa",$dino);
$dino=str_replace("3","Rabu",$dino);
$dino=str_replace("4","Kamis",$dino);
$dino=str_replace("5","Jum'at",$dino);
$pasar=str_replace("4","Legi",$pasar);
$pasar=str_replace("0","Pahing",$pasar);
$pasar=str_replace("1","Pon",$pasar);
$pasar
=str_replace("2","Wage",$pasar);
$pasar=str_replace("3","Kliwon",$pasar);

$wektu = date("G",time()+($g3ni*3600));

// Mulai wekdal zona ingkang wonten zona host php.
if($wektu>=5&&$wektu<=8)
$welcome_string="Pagi hari";
else if($wektu>=9&&$wektu<=10)
$welcome_string="Pagi hari menjelang siang";
else if($wektu>=11&&$wektu<=14)
$welcome_string="Siang hari";
else if($wektu>=15&&$wektu<=16)
$welcome_string="Siang hari menjelang sore";
else if($wektu>=17&&$wektu<=18)
$welcome_string="Sore hari";
else if($wektu>=19&&$wektu<=23)
$welcome_string="Malam hari";
else if($wektu>=0&&$wektu<=1)
$welcome_string="Malam menjelang dini hari";
else if($wektu>=2&&$wektu<=4)
$welcome_string="Dini hari";
$dinojowo="$dino";
$wib="$dinojowo ($tang $jam)";
$pass = "$set[b]"; //password
$CONF['ns'] = 1; // Pesan tiap page
$CONF['np'] = 8000; // Jml pesan maximal
$int = "./onof.dat"; //data shout
session_start();
?>
