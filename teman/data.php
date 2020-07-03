<?
echo "<div class=\"iblock1\"><img src='/dis/blog.png' alt='' /> <a href=\"/teman/\"><font color=\"red\"><b>SOBAT SOBATKU</b></font></a></div></div><div class=\"row\">";
if(!isset($HTTP_REQUEST_VARS))
$HTTP_REQUEST_VARS=$_REQUEST;
if(!isset($HTTP_SERVER_VARS))
$HTTP_SERVER_VARS=$_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);
$p = 10;?>
<?if ($hal == ""){$hal = "1";}
$xfile=@file("teman/teman.dat");
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
print "<a href=\"$konco[1]\"><font color=\"orange\">".$konco[0]."</a></font><font color=\"red\">, </font>";
}
print "$rew&nbsp$next</div>";
?>