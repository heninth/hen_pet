<?php
require 'common.inc.php';
if(!$is_admin){showmessage('Access Denied.');}

if($_POST['submit']=='Add'){
	if(!$_POST['image']||!$_POST['name']||!$_POST['price']){showmessage('กรอกข้อมูลให้ครบ');}
	$islimited = ($_POST['islimited']==1) ? 1 : 0;
	$limited = intval($_POST['limited']);
	if(DB::query("INSERT INTO ".DB::table('hen_petshop')." (image,name,price,islimited,limited,onsell) VALUES ('{$_POST['image']}','{$_POST['name']}','{$_POST['price']}','{$islimited}','{$limited}','1')")){
		showmessage('Success.','plugin.php?id=hen_pet:admin&do=add');
	}else{
		showmessage('Adding fail.');
	}
}else{
	include template('hen_pet:header');
	echo '<center><form action="plugin.php?id=hen_pet:admin&do=add" method="post" name="addpet">';
	echo '<table>';
	echo '<tr><td><span>URL ไฟล์รูป</td><td><input type="text" name="image" value="" size="30" /></td></tr>';
	echo '<tr><td><span>ชื่อ</td><td><input type="text" name="name" value="" size="30" /></td></tr>';
	echo '<tr><td><span>ราคา</td><td><input type="text" name="price" value="" size="10" maxlength="8" /></td></tr>';
	echo '<tr><td><span>จำนวนจำกัดหรือไม่</td><td><input type="checkbox" id="islimited" name="islimited" value="1" /></td></tr>';
	echo '<tr><td><span>จำนวนที่มีกรณีมีจำนวนจำกัด</td><td><input type="text" id="limited" name="limited" value="" size="10" maxlength="8" /></td></tr>';
	echo '<tr><td></td><td><input type="submit" name="submit" value="Add"/></td></tr>';
	echo '</table></form></center>';
	include template('hen_pet:footer');
}
?>