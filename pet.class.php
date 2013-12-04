<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class plugin_hen_pet {
}
class plugin_hen_pet_forum extends plugin_hen_pet {
	function viewthread_sidebottom_output() {
		global $postlist,$_G;
		$output = array();
		if($_G['cache']['plugin']['hen_pet']['open']==2){return $output;}
		$i = 0;
		foreach($postlist as $p){
			$p['authorid'] = intval($p['authorid']);
			if($pet = DB::fetch_first("SELECT n.*,m.image AS image, m.name AS name FROM ".DB::table('hen_mypet')." n LEFT JOIN ".DB::table('hen_petshop')." m ON n.pid=m.pid WHERE n.uid = {$p['authorid']} AND current = 1")){
				$output[$i] = '&nbsp;&nbsp;&nbsp;<b>Pet:</b><center><div style="width:140px;"><strong>'.$pet['name'].'</strong><br>'.$pet['text'].'<br><img src="'.$pet['image'].'" /></div></div><br /><span title="Copyright hen &amp; new">&copy;</span></center>';
			}else{
				$output[$i] = '' ;
			}
			$i++;
		}

		return $output;
	}
}
?>