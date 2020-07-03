<?php
# isp ngambil data dari ip, ntar klo bikin lg, boros kebanyakan safe vars datanya. Wekz :p
$isp = $text[9];
if(preg_match('/202\.93\.(3[6-7])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Indosat<br />';
}elseif(preg_match('/203\.78\.(12[0-7]|11[2-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Natrindo<br />';
}elseif(preg_match('/202\.59\.174\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Three<br />';
}elseif(preg_match('/202\.152\.240\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[5-9][0-9])/',$isp)){
echo'ISP: XL<br />';
}elseif(preg_match('/202\.70\.(6[0-3]|5[0-9]|4[8-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Smart<br />';
}elseif(preg_match('/202\.3\.(22[0-3]|21[0-9]|20[89])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Telkomsel<br />';
}elseif(preg_match('/221\.132\.(25[0-5]|2[0-4][0-9]|19[2-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Telkomsel<br />';
}elseif(preg_match('/202\.152\.(9[0-5]|[7-8][0-9]|6[4-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Simpur Brunei<br />';
}elseif(preg_match('/202\.160\.(4[0-7]|3[2-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Brunet<br />';
}elseif(preg_match('/125\.(16[0-3])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Telkom Speedy<br />';
}elseif(preg_match('/222\.124\.(12[0-7]|1[0-1][0-9]|[7-9][0-9]|6[4-9])\.(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])/',$isp)){
echo'ISP: Telkom Speedy<br />';
}elseif(preg_match('/212\.204\.254\.([0-9]|1[0-9])/',$isp)){
echo'ISP: Phonifier<br />';
}elseif(preg_match('/205\.188\.242\.([0-9]|1[0-9])/',$isp)){
echo'ISP: Aol<br />';
}elseif(preg_match('/193\.46\.236\.(1[0-9][0-9])/',$isp)){
echo'ISP: Bwap<br />';
}elseif(preg_match('/69\.28\.226\.([0-9][0-9])/',$isp)){
echo'ISP: Ocean Lake<br />';
}elseif(preg_match('/203\.130\.([0-9][0-9]|[0-9][0-9][0-9])\.([0-9][0-9]|[0-9][0-9][0-9])/',$isp)){
echo'ISP: Telkomnet Instan<br />';
}elseif(preg_match('/212\.200\.65\.([0-9][0-9]|[0-9][0-9][0-9])/',$isp)){
echo'ISP: Telkomnet Instan<br />';
}else{
echo'ISP: Gratisan<br />';
}
?>
