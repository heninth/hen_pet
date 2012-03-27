<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS `pre_hen_petshop`;
DROP TABLE IF EXISTS `pre_hen_mypet`;

EOF;

runquery($sql);

$finish = TRUE;
?>