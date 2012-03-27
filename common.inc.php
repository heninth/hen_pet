<?php
if(!defined('IN_DISCUZ')) {exit('Access Denied');}
loadcache('plugin');
$config = $_G['cache']['plugin']['hen_pet'];
if($config['open']==2){showmessage('Plugin was close.');}
$config['admin'] = explode(',', $config['admin']);
$is_admin = in_array($_G['uid'], $config['admin']);
?>