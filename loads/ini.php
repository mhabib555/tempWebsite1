<?php
@include '../moduls/function.php';
$set[2]="$set[b]";
$dir = 'files';
$style = '<style type="text/css">
body {margin: auto;
margin-top: 1px;
max-width:350px;
padding:0px;
padding:0px;
font-size:12px;
font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif;
}
.topdiv{
background-color:#960000;
color:white;
padding-left:5px;
font-weight:bold;
text-align:center;
}
a{
color:darkred;
text-decoration:none;"
}
div{
border-bottom:1px solid #eee;
border-left:1px solid #eee;
border-right:1px solid #eee;
padding-left:5px;
padding-top:3px;
padding-bottom:1px;
}
.div2 {background-color:#eee;
font-size:14px;
font-weight:bold;
}
.div3{
background-color:#2971A7;
font-weight:bold;
color:#fff;
font-size:14px;
}
input,select,textarea{
border-bottom:1px solid darkred;
border-top:1px solid darkred;
border-left:1px solid darkred;
border-right:1px solid darkred;
}
</style>';
//error_reporting('E_ALL & ~E_NOTICE & ~E_STRICT');                                                              //�zN^���?����
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                                                                //�'�uNENa�?���? ���?�?N,����N?�"
header("Cache-Control: no-cache, must-revalidate");                                                              //�'�uNENa�?���? ���?�?N,����N?�"
header("Pragma: no-cache");                                                                                      //�'�uNENa�?���? ���?�?N,����N?�"
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");                                                    //�'�uNENa�?���? ���?�?N,����N?�"
echo'<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru">
<head>
<meta http-equiv="Content-Type" content="application/vnd.wap.xhtml+xml; charset=UTF-8"/>
</head>
<body><html>
';                                                                                                               //�'�uNENa�?���? ���?�?N,����N?�"
function foot() {                                                                                                //�t���? N?���?N,��echo '<div class="topdiv"><u>Made by EuroDesigN</u></div>';
echo '<center>' . round ( microtime () - 0, 7 ) . '</center>';                                         //�"�u�?�uNE��N?��NZ
}                                                                                                                //�s�?�?�uN?
?>
