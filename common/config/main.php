<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'America/Mexico_City',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

	'urlManager' => [
	    'class' => 'yii\web\UrlManager',
	    // Disable index.php
	    'showScriptName' => false,
	    // Disable r= routes
	    'enablePrettyUrl' => true,
	    'rules' => array(
		    '<controller:\w+>/<id:\d+>' => '<controller>/view',
		    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
		    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
		    'site/confirm/<id:\d+>/<key:\d+>' => 'site/confirm',
		    ),
    	],
    ],
];
