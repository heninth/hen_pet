<?php
require 'common.inc.php';
if(!$_G['uid']){showmessage('not_loggedin', NULL, array(), array('login' => 1));}
if(!$_GET['pid']){showmessage('Error.');}
DB::query("UPDATE ".DB::table('hen_mypet')." SET current = 0 WHERE uid = {$_G['uid']}");

if(DB::query("UPDATE ".DB::table('hen_mypet')." SET current = 1 WHERE uid = {$_G['uid']} AND pid = {$_GET['pid']}")){
	showmessage('Success.','plugin.php?id=hen_pet:mypet');
}else{
	showmessage('Error.');
}
?>