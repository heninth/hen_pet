<?php
require 'common.inc.php';
if(!$is_admin){showmessage('Access Denied.');}

if($_POST['submit']=='Edit'){
	if(!$_POST['image']||!$_POST['name']||!$_POST['price']){showmessage('กรอกข้อมูลให้ครบ');}
	$islimited = ($_POST['islimited']==1) ? 1 : 0;
	$onsell = ($_POST['onsell']==1) ? 1 : 0;
	$limited = intval($_POST['limited']);
	$pid = intval($_POST['pid']);
	if(!$pid){
		showmessage('Invail PID.','plugin.php?id=hen_pet:admin');
	}
	if(DB::query("UPDATE ".DB::table('hen_petshop')." SET image='{$_POST['image']}',name='{$_POST['name']}',price='{$_POST['price']}',islimited='{$islimited}',limited='{$limited}',onsell='{$onsell}' WHERE pid='$pid' LIMIT 1")){
		showmessage('Success.','plugin.php?id=hen_pet:admin');
	}else{
		showmessage('Edit fail.');
	}
}else{
	$pid = intval($_GET['pid']);
	if(!$pid){
		showmessage('Invail PID.','plugin.php?id=hen_pet:admin');
	}
	$pet = DB::fetch_first("SELECT * FROM ".DB::table('hen_petshop')." WHERE pid='$pid'");
	include template('hen_pet:header');
	echo '<center><form action="plugin.php?id=hen_pet:admin&do=edit" method="post" name="addpet">';
	echo '<table>';
	echo '<tr><td><span>URL ไฟล์รูป</td><td><input type="text" name="image" value="'.$pet['image'].'" size="30" /></td></tr>';
	echo '<tr><td><span>ชื่อ</td><td><input type="text" name="name" value="'.$pet['name'].'" size="30" /></td></tr>';
	echo '<tr><td><span>ราคา</td><td><input type="text" name="price" value="'.$pet['price'].'" size="10" maxlength="8" /></td></tr>';
	echo '<tr><td><span>จำนวนจำกัดหรือไม่</td><td><input type="checkbox" id="islimited" name="islimited" value="1"'.($pet['islimited']?' checked="checked"':'').' /></td></tr>';
	echo '<tr><td><span>จำนวนที่มีกรณีมีจำนวนจำกัด</td><td><input type="text" id="limited" name="limited" value="'.$pet['limited'].'" size="10" maxlength="8" /></td></tr>';
	echo '<tr><td><span>ใช้งานหรือไม่</td><td><input type="checkbox" id="onsell" name="onsell" value="1"'.($pet['onsell']?' checked="checked"':'').' /></td></tr>';
	echo '<tr><td></td><td><input type="submit" name="submit" value="Edit"/></td></tr>';
	echo '</table><input type="hidden" name="pid" value="'.$pet['pid'].'" /></form></center>';
	include template('hen_pet:footer');
}
?>