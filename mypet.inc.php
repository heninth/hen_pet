<?php
require 'common.inc.php';
if(!$_G['uid']){showmessage('not_loggedin', NULL, array(), array('login' => 1));}
$width = $config['width'];
$colum = $config['colum'];
include template('hen_pet:header');

$re = DB::query("SELECT n.*,m.image AS image, m.name AS name FROM ".DB::table('hen_mypet')." n LEFT JOIN ".DB::table('hen_petshop')." m ON n.pid=m.pid WHERE n.uid = {$_G['uid']}");
echo '<style type="text/css">.pname{color:#39F;}.ppricet{color:#F93;}.ppricen{color:#0C3;}.plimitt{color:#B00;}</style>';
echo '<center><table width="'.$width.'px;"><tr style="width:'.($width/$colum).'px;">';

while($p = DB::fetch($re)){

	if($tmp_td==$colum){
		echo '</tr><tr style="width:'.($width/$colum).'px;">';
		$tmp_td = 0;
	}
	
	echo '<td><center><div style="width:'.($width/$colum).'px;height:180px;background:url('.$p['image'].') center no-repeat;"></div><br /><strong class="pname">'.$p['name'].'</strong><br />';
	echo '<span>'.$p['text'].'</span><span class="ppricen"><a href="plugin.php?id=hen_pet:descedit&pid='.$p['pid'].'">[แก้ไข]</a></span><br />';
	if($p['current']==1){
		echo '<span style="color:green;">กำลังใช้งาน</span>';
	}else{
		echo '<span><a href="plugin.php?id=hen_pet:current&pid='.$p['pid'].'">[เปิดใช้งาน]</a></span>';
	}
	echo '</center></td>';
	$tmp_td++;
}
echo '</tr></table></center>';

include template('hen_pet:footer');
?>