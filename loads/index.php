<?php

@$dir=$_GET['d'];
@$n=$_GET['n'];
$n=intval($n);
@$s=$_GET['s'];
$s=intval($s);
@$ns=$_GET['c'];
$ns=intval($ns);
if($ns<1) $ns=15;
function to_rus($str){
$str=substr($str,1);
$str=strtr($str,array(
'A'=>'А','a'=>'а','B'=>'Б','b'=>'б',
'V'=>'В','v'=>'в','G'=>'Г','g'=>'г',
'D'=>'Д','d'=>'д','E'=>'Е','e'=>'е',
'yo'=>'ё','Yo'=>'Ё','Zh'=>'Ж','zh'=>'ж',
'Z'=>'З','z'=>'з','I'=>'И','i'=>'и',
'J'=>'Й','j'=>'й','K'=>'К','k'=>'к',
'L'=>'Л','l'=>'л','M'=>'М','m'=>'м',
'N'=>'Н','n'=>'н','O'=>'О','o'=>'о',
'P'=>'П','p'=>'п','R'=>'Р','r'=>'р',
'S'=>'С','s'=>'с','T'=>'Т','t'=>'т',
'U'=>'У','u'=>'у','F'=>'Ф','f'=>'ф',
'H'=>'Х','h'=>'х','C'=>'Ц','c'=>'ц',
'Ch'=>'Ч','ch'=>'ч','Sh'=>'Ш','sh'=>'ш',
'Sch'=>'Щ','sch'=>'щ',"''"=>'ъ',"'"=>'ь',
'Y'=>'Ы','y'=>'ы','Ye'=>'Э','ye'=>'э',
'Yu'=>'Ю','yu'=>'ю','Ya'=>'Я','ya'=>'я',
'_'=>' '));
return $str;
}

@include "../moduls/function.php";
$title="dowload";
@include "../moduls/header.php";

echo'<div class="iblock1">';
if(empty($dir)){
$dir='.'; print 'Downloads Menu</div>';
}else{
$f=strrpos($dir,'/');
if($f===false) $f=-1;
$str=substr($dir,$f+1);
if($str{0}=='!') $str=to_rus($str); else $str=strtr($str,'_',' ');
print htmlspecialchars($str);
}

if(strpos($dir,'..')!==false or strpos($dir,'/.')!==false) die('terkunci.</div></html>');
if($dir!='.'){
print '<img src="/dis/back.png" /> <b><a href="index.php?d=';
$f=strrpos($dir,'/');
if($f!==false) print substr($dir,0,$f);
print '&amp;s='.$s.'&amp;c='.$ns.'">. .</a></b></div>'; }
$arr=array();
$d=opendir($dir);
while($f=readdir($d)){
if($f!='.' and $f!='..' and $f!='.htaccess' and $f!='qj_logo' and $f!='index.php' and
$f!='foot.php' and
$f!='favicon.ico' and
$f!='header.php' and
$f!='hijriah.php' and
$f!='bro.css' and
$f!='hd.gif' and
$f!='.fc.gif' and
$f!='arsip' and
$f!='style.css' and
$f!='count.php' and
$f!='counter.txt' and
$f!='stats.dat' and
$f!='stats.php' and
$f!='stats_inc.php' and
$f!='ini.php' and
$f!='upload.php' and
$f!='tambah.php' and
$f!='import.php' and
$f!='load.php'){

if($s=='2') $arr[$f]=filemtime($dir.'/'.$f); else $arr[$f]=filesize($dir.'/'.$f);
}} closedir($d);
if($s!=0) asort($arr); else ksort($arr);
function out($name,$info){
$name=htmlspecialchars($name);
$f=strrpos($name,'.');
if($f){ $ext=substr($name,$f); $str=substr($name,0,$f); }else{ $ext='dir'; $str=$name; }
if($name{0}=='!') $str=to_rus($str); else $str=strtr($str,'_',' ');
if($GLOBALS['dir']!='.') $name=$GLOBALS['dir'].'/'.$name;
print '<div class="iblock"><img src="/dis/';
switch($ext){
case 'dir': $ico='cldir.png'; break;
case '.png': $ico='png.png'; break; case '.jpeg': $ico='jpg.png'; break;
case '.gif': $ico='gif.png'; break;
case '.mid': $ico='mid.png'; break;
case '.mp3': $ico='mp3.png'; break;
case '.wav': case '.amr': $ico='wav.png'; break;
case '.mmf': $ico='mmf.png'; break;
case '.tar': $ico='rar.png'; break; case '.gz': $ico='rar.png'; break; case '.rar': $ico='rar.png'; break;
case '.jad': $ico='jad.png'; break;
case '.zip': $ico='zip.png'; break;
case '.txt': $ico='txt.png'; break;
case '.exe': $ico='exe.png'; break;
case '.jar': $ico='jar.png'; break;
case '.php': $ico='php.png'; break;
default: $ico='unkn.png'; break; }
print $ico.'" alt="'.$ext.'" /><a href="';
if($ext=='dir') print './?d='.$name.'&amp;s='.$GLOBALS['s'].'&amp;c='.$GLOBALS['ns']; else print $name;
print '"><font color="red">'.$str.'</font></a>';
if($ext!='dir' and $GLOBALS['s']!=2) print '<small>('.round($info/1024,1).'kB)</small>'; elseif($ext!='dir') print '<br /> <small>('.date('d.M.Y',$info).')</small>';
print '</div></div>
'; }
$cnt=count($arr);
$i=0; $c=0;
foreach($arr as $name=>$info){
if($c<$n){ $c++; continue; }
if($i==$ns) break;
out($name,$info);
$i++; $c++; }
if($cnt==0) print '<div class="menu">No folder and file';
print '</div></div><div class="aut">
';
if($dir!='.') $dir=htmlspecialchars($dir); else $dir='';
if($c<$cnt or $c>$ns) print '<small>';
if($c<$cnt) print '|[<a href="index.php?d='.$dir.'&amp;n='.$c.'&amp;c='.$ns.'&amp;s='.$s.'">Next</a>]|';
if($c>$ns){ print '|[<a href="index.php?d='.$dir.'&amp;c='.$ns.'&amp;s='.$s.'">Prev</a>]|
';
}elseif($c<$cnt) print '|[<a href="index.php?d='.$dir.'&amp;n='.($cnt-$ns).'&amp;c='.$ns.'&amp;s='.$s.'">Last</a>]|<div><div class="aut">';
echo'<b>&raquo; Total Files: '.$cnt.'</b><br/><b>&raquo; <a href="tambah.php">Tambah file</a></b></div>';
@include "../moduls/foot.php";
?>
