<?
include "../moduls/function.php";
$title = "site teman";
include "../moduls/header.php";
echo"<div class=\"iblock1\"><center>Partner list</center></div>";
if(!isset($HTTP_REQUEST_VARS))
$HTTP_REQUEST_VARS=$_REQUEST;
if(!isset($HTTP_SERVER_VARS))
$HTTP_SERVER_VARS=$_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
$p = 10;?>
<?if ($hal == ""){$hal = "1";}
$xfile=@file("teman.dat");
$first = count($xfile) - ($p * ($hal - 1));
$second = count($xfile) - ($p * $hal) + 1;
if ($second < 1) {$second = 1;}
$hals = (count($xfile) / $p);
if ($hal>1) $rew = "<a href=\"$PHP_SELF?hal=".($hal-1)."\">".($hal-1)."</a>";
if ($hal<$hals) $next = "<a href=\"$PHP_SELF?hal=".($hal+1)."\">".($hal+1)."</a>";
for ($i = $first-1; $i >= $second-1; $i--)
{
$ii = $i;
$ii++;
$konco = explode("|",$xfile[$i]);
print "<div class=\"row\"><font color=\"red\"><b>$konco[0]</b></font><br/><img src='/dis/home.png' alt='' />
<a href=\"$konco[1]\">".$konco[1]."</a></div>";
}
print "<div class=\"row\">";
print "$rew&nbsp$next ";
print "</div>";
include '../moduls/foot.php';
?>
