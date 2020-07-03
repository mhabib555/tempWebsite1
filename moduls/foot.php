<?
echo '<div class="iblock1"><center><a href="/">HomE</a> | <a href="/bukutamu/">Guestbook</a> | <a href="/loads/">Download</a></center></div>';
include 'count.php';
include'function.php';
echo '<div class="menu"><div class="add"><center>';
echo admob_request($admob_params);
echo'</div><center><a href="http://mobi.ps/" target="_blank"><img src="http://www.mobi.ps/static/images/logo.gif" alt="Web Hosting" width="40" height="20" border="0" /></a> <a href="http://co.cc/" target="_blank"><img src="http://www.co.cc/img/cc_logo.gif" alt="free domain" width="40" height="20" border="0" /></a><br/>';
list($msec,$sec)=explode(chr(3),microtime());
echo 'Speed: '.round(($sec + $msec) - $conf['headtime'], 3).' / detik</center></div><div class="iblock1"><b>'.$set[h].'</b></div></body></html>';
?>
