<?php
if(isset($_SESSION['shout_adm'])){
print('<div class="iblock"><a href="./?a=keluar">LOG OUT</a> | <a href="./edit.php">EDIT</a> | <a href="./?a=nyerat">BUAT BARU</a> | <a href="./del.php?clear&amp;'.SID.'">HAPUS</a></div>');
}
else {
echo '<div class="iblock">&raquo; <a href="./admin.php">Panel</a></div>';
}
?>
