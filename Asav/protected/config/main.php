<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap',realpath(dirname(__FILE__) . "../../extensions/bootstrap"));

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=> realpath(dirname(__FILE__). "../../"),
	'name'=>'ASAV Int',
	'theme'=>'bootstrap',
		
	// Website configuration
	'charset'=>'utf-8',
	'sourceLanguage'=>'fr_fr',
	'language'=>'fr',

	// preloading 'log' component
	'preload'=>array('bootstrap', 'log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'asav',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths'=>array('ext.bootstrap.gii'),
		),
		
	),

	// application components
	'components'=>array(
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<action:(login|logout|contact|home)>'=>array(
					'/<action>',
					'caseSensitive'=>false
				),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// MySQL connection to our remote database. PhpMyAdmin: https://n1nlsmysqladm01.secureserver.net/dgrid50/39
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=asav',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'asav@omesis.net',
		'custom' =>array(
				// Upload folder path
				'uploadPath' => 'assets/uploads/'
		),
	),
	
);