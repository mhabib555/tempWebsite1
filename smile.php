<?php
//editing file by http://seupang.Co.Cc http://penceter.co.cc
@$pas=$_GET['pas'];
@$n=$_GET['n'];
$pageName ='Smiles';
$PHP_SELF = basename($_SERVER['PHP_SELF']);
require 'moduls/stats_inc.php';
include "moduls/function.php";
$title ="smile";
include("moduls/header.php");
require('shoutbox/shoutbox.php');
echo'<div class="iblock1">List smile</div>';
require('shoutbox/smiles.php');
$cnt=count($sstr);
for($c=0;$c<7;$c++){
if($c+$n>$cnt-1) break;
echo'<div class="menu">';
print $simg[$c+$n].' '.$sstr[$c+$n].'</div>
';
}
print '</div>';
$n=$n+$c;
if($n<$cnt){
print '<div class="menu">&gt;<a href="smile.php?n='.$n;
if($pas) print '&amp;pas='.$pas;
print '">next</a></div>';
}
include"moduls/foot.php";
?>
