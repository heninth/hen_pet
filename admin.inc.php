<?php
require 'common.inc.php';
$petadmin = true;
if(!$is_admin){showmessage('Access Denied.');}
if(!$_GET['do']){
	include template('hen_pet:header');
	echo '<center>';
	$re = DB::query("SELECT * FROM ".DB::table('hen_petshop')."");
	while($p = DB::fetch($re)){
		echo '<div style="width:400px;text-align:left;"><img src="'.$p['image'].'" alt="" style="float:left;margin-right:8px;" />
		Name: ',$p['name'],'<br />
		Price : ',$p['price'],'<br />
		';
		if($p['islimited']){
			echo 'คงเหลือ: ',$p['limited'],'<br />
		';
		}
		echo '<a href="plugin.php?id=hen_pet:admin&do=edit&pid=',$p['pid'],'">[Edit Pet]</a> <a href="javascript:;" onClick="if(confirm(\'ต้องการลบ?\')){location.href=\'plugin.php?id=hen_pet:admin&do=del&pid=',$p['pid'],'\'}">[Delete Pet]</a></div>
		<div style="clear:both;height:20px;"></div>';
	}
	echo '<div style="clear:both;"></div><a href="plugin.php?id=hen_pet:admin&do=add">[Add New Pet]</a></center>';
	include template('hen_pet:footer');
}else{
	if(in_array($_GET['do'],array('add','edit','del'))){
		include $_GET['do'].'.admin.php';
	}else{
		showmessage('Unknow Operation.');
	}
}
?>