<?php
require 'common.inc.php';
if(!$_G['uid']){showmessage('not_loggedin', NULL, array(), array('login' => 1));}
if(!$_GET['pid']){showmessage('Error.');}

if($_POST['submit']==true){
	if($_POST['pid']!=$_GET['pid']){showmessage('Error.');}
	if(DB::query("UPDATE ".DB::table('hen_mypet')." SET text = '{$_POST['newtext']}' WHERE uid = {$_G['uid']} AND pid = {$_POST['pid']}")){
		showmessage('Success.','plugin.php?id=hen_pet:mypet');
	}else{
		showmessage('Error.');
	}
}else{
	include template('hen_pet:header');
	echo '<center><form action="plugin.php?id=hen_pet:descedit&pid='.$_GET['pid'].'" method="post">
	<input name="pid" type="hidden" value="'.$_GET['pid'].'" />
	<div style="text-align:center;width:480px;">ใส่ข้อความใหม่ (25 ตัวอักษร) : <input name="newtext" type="text" maxlength="25" style="padding: 2px 4px;border: 1px solid;font-size: 14px;color: #666;border-color: #707070 #CECECE #CECECE #707070;" />&nbsp;
	<button type="submit" name="submit"  value="true" class="pn"><strong>แก้ไข</strong></button></div></form></center>';
	include template('hen_pet:footer');
}
?>