<?php $time_format = 'd-m-y H:i:s';
$per_page = 1;
$per_Hal = 1;
$data_file = "./dblink.php";
$divider = '|~|';
if(!isset($HTTP_REQUEST_VARS)) $HTTP_REQUEST_VARS = $_REQUEST;
if(!isset($HTTP_SERVER_VARS)) $HTTP_SERVER_VARS = $_SERVER;
extract($HTTP_REQUEST_VARS);
extract($HTTP_SERVER_VARS);

if(!isset($site_id)) $site_id = 1;
header('Cache-control: no-cache, must-revalidate');

function site() {
global $PHP_SELF, $site_id, $per_page, $data_file, $divider, $time_format;
$data = file($data_file);
sort($data);
$total_all = ceil(count($data));
$total_page = ceil(count($data) / $per_page);
if($site_id < 0 || $site_id > $total_page) $site_id = 1;
$no = $site_id * $per_page - $per_page;
$num=$total_all-$no;
for($i=0; $i<$per_page; $i++) {
if(isset($data[$no])) {
$line = explode($divider, $data[$no]);


$waktu = gmdate($time_format, $line[0]);
$ke=explode(' ',$line[3]);
$k[0]=$line[1]; $k[1]=$ke[4]; $k[2]=$ke[2]; $k[3]=$ke[0]; $k[4]=$ke[5]; $keyword=implode(',',$k);
$desc=substr($line[3],0,25);
$titl[0]=$line[1];
$titl[1]=$line[2];
include'../moduls/function.php';
$title=implode(' | ',$titl);
include '../moduls/header.php';
echo '<div class="iblock1">'.$line[1].'</div><div class="row">';
if (trim($line[6])<>"" and trim($line[6])<>"http://") { if (ereg("^http://", trim($line[6]))) if (ereg("jpg|gif|png", trim($line[6])))
{echo '<center><img src="'.$line[6].'" alt="'.$line[1].'" width="50%" height="50%" /></center><br />';}}
echo '<b>URL :</b><a href="'.$line[4].'"> '.$line[4].'</a><br />';
if (trim($line[5])<>"" and
trim($line[5])<>"@") {
if (ereg("@", trim($line[5])))
echo '<b>Email :</b> <a href="mailto:$line[5]">'.$line[5].'</a><br />'; }
echo '<b>Owner :</b> '.$line[2].'<br /><b>Deskripsi :</b> ';
$msg = nl2br($line[3]);
echo $msg .'<br />
<b>Join</b> : '.$waktu.' wib<br />
<b>Link</b> :<br /><input type="text" value="http://'.$_SERVER['HTTP_HOST'].'/link/friend.php?site_id='.$site_id.'" /></div>';
$no++;
echo '<div class="row">&laquo; <a href="./index.php">Daftar link</a></div>
';
include "../moduls/foot.php";
}}} site(); ?>
