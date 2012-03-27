<?php
require 'common.inc.php';
if(!$is_admin){showmessage('Access Denied.');}

if($_GET['pid']){
$_GET['pid'] = intval($_GET['pid']);
if(DB::query("DELETE FROM ".DB::table('hen_petshop')." WHERE pid='{$_GET['pid']}' LIMIT 1")&&DB::query("DELETE FROM ".DB::table('hen_mypet')." WHERE pid='{$_GET['pid']}'")){
showmessage('Success.','plugin.php?id=hen_pet:admin');
}
}
?>