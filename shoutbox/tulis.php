<?
//editing file by http://seupang.Co.Cc http://penceter.co.cc
print('<div class="aut">
<form action="/shoutbox/say.php".psid()."" method="post">
<input name="nick" type="text"size="15" ');
if(isset($_SESSION['sgb_name'])) print('value="'.$_SESSION['sgb_name'].'"');
else print('value="nama"onfocus="if(this.value="nama" ');
print(' /><br/><input name="text" value="pesan kamu"onfocus="if(this.value=pesan kamu) this,value"" size="15" />');
if(isset($_GET['n']) && isset($arr[$_GET['n']])){
$_GET['n']=intval($_GET['n']);
$post=unserialize($arr[$_GET['n']]);
print($post['nick'].', ');
}
$key = rand(00,99);
echo'<input type="hidden" name="kode" readonly value="'.$key.'">
<input type="hidden"     name="hasil" size="8" class="number" maxlength="5" value="'.$key.'">';
print('
<input type="submit" value="Post" /></form></div>');
?>
