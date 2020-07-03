<?
$cz=intval(@$_GET['cz']);
// Membuka data shout
$arr=file('./status/onof.dat');
$jml = count($arr);
for($i=0;$i<1;$i++){
if($cz==$jml) break;
$post=unserialize($arr[$cz]);
// Hasil post pesan
$nama_shout = $post['nick_shout'];
$jam = $post['time'];
$pesan_shout = $post['text_shout'];
include'pesan.php';
echo'<div class="iblock1"><img src="/dis/news.png" alt="" /> <a href="/status/"><b>'.$nama_shout.'</a></b> '.$jam.'</div><div class="menu">';
if (strlen($pesan_shout) > 500){
print substr($pesan_shout, 0, 500).'</div>';
}else{
print $pesan_shout.'</div>';
}
$cz++;
}
if ($jml == 0) {
echo '';
}
?>
