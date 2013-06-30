<?php
/**
 * �����������ļ�
 * ���в���������Ҫɾ���������ʱ�򣬲���Ҫunset�����������д�ṹһ����������Բ���unset
 */
$config_dir = dirname(__FILE__) . '/mode.conf';
$mode = trim(file_get_contents($config_dir));
$main_conf = require(dirname(__FILE__).'/'.$mode.'.php');
// ע����main�е�����
unset($main_conf['components']['session']);
unset($main_conf['components']['sessionCache']);
unset($main_conf['defaultController']);
unset($main_conf['components']['coreMessages']);
unset($main_conf['components']['log']);
return CMap::mergeArray(
	$main_conf,
	array(
	// application components
	'components'=>array(
		'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
                array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>'qixiaopeng@55tuan.com',
					),
				),
			),
		),
	)
);
