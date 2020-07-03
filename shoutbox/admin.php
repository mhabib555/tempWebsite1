<?php
/*
####
Di edit lagi oleh:mottolover

Home: http://mymotto.110mb.com
##########
*/
include'../moduls/function.php';
require('shout.php');
$title="admin area";
include'../moduls/header.php';


if(isset($_GET['p'])){
if($_GET['p']==$CONF['admp']){
$_SESSION['sgb_admp']=true;
print('<div class="row"><center>Login success!<br /><small>Click</small><br />[<a href="index.php'.psid().'">Here</a>]</center></div>');
}else print('<div class="row"><center>Password salah!<br />[<a href="admin.php'.psid().'">Ulangi</a>]</center></div>');
}else print('<div class="row"><center>
<form action="admin.php'.psid().'" method="get">
Enter Password:<br />
<input type="password" name="p" size="12" /><br />
<input type="submit" value="OK" />
</form>
</center></div>');
include'../moduls/foot.php';
?>
