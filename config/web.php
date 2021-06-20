<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'name' => 'CARDIO Monitor',
    'bootstrap' => ['log'],
    'components' => [
        'session' => [
            'name' => 'advanced',
            'cookieParams' =>[
                'httpOnly' => true,
//                'domain' => 'fleetcar.app',
//                'path' => 'demo'
     ]
            ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
        ],
 /*'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    ],*/

    'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    //'basePath' => '@app/lng',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/spr' => 'spr.php',
                        'app/auth' => 'auth.php'
                    ]
                ],
            ],
        ],
        'user' => [
            'class' => 'webvimark\modules\UserManagement\components\UserConfig',
            'enableAutoLogin' => true,
            'identityCookie' => ['name'=> '_identity',],
            // Comment this if you don't want to record user logins
            'on afterLogin' => function($event) {
                \webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            }
        ],
       'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'v1YXs2Mt5eeq6MH_eE8Jzvwd0F1rtSyE',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules'=>[

	'datecontrol' =>  [
        	'class' => 'kartik\datecontrol\Module',
    	],

'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],

//        'yii2images' => [
//            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
//            'imagesStorePath' => 'images/store', //path to origin images
//            'imagesCachePath' => 'images/cache', //path to resized copies
//            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
//            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
//        ],
        'user-management' => [
            'class' => 'webvimark\modules\UserManagement\UserManagementModule',

            // 'enableRegistration' => true,

            // Here you can set your handler to change layout for any controller or action
            // Tip: you can use this event in any module
            'on beforeAction'=>function(yii\base\ActionEvent $event) {
                if ( $event->action->uniqueId == 'user-management/auth/login' )
                {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
    ],
    'params' => $params,
    'language' => 'ru-RU',
    'sourceLanguage' => 'en-EN',

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
