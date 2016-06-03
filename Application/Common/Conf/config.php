<?php
return array(
	//数据库配置信息
'DB_TYPE'   => 'mysql', // 数据库类型
'DB_HOST'   => 'localhost', // 服务器地址
'DB_NAME'   => 'timer', // 数据库名
'DB_USER'   => 'root', // 用户名
'DB_PWD'    => '', // 密码
'DB_PORT'   => 3306, // 端口
'DB_PREFIX' => 'think_', // 数据库表前缀 
'DB_CHARSET'=> 'utf8', // 字符集
'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
'VAR_URL_PARAMS'      => '_URL_', // PATHINFO URL参数变量
'USER_AUTH_KEY'=>'authId',
	
		//定义系统常量
		'SYSNAME'=>'定额工时管理系统',
		'VERSION'=>'1.0Bate',
		'FUNCTION'=>'实现对质定额工时的在线编制、查阅、统计工作。',
);
