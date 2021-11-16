<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'rumah-jali',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4Dr1~k4rAen9~m4Ma54-^D*l0<3~L14_d0',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],
        'db' => require(__DIR__ . '/db.php'),
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // [
                //     'pattern' => 'lihat-keranjang',
                //     'route' => 'site/lihat-keranjang',
                //     //'suffix' => '.ab',
                // ],
                // [
                //     'pattern' => 'home-rumahjali',
                //     'route' => 'site/index',
                //     //'suffix' => '.ab',
                // ],
                // [
                //     'pattern' => 'kategori',
                //     'route' => 'site/side-kategori',
                //     //'suffix' => '.ab',
                // ],
                // [
                //     'pattern' => 'cek-pemesanan-anda',
                //     'route' => 'site/cek-pemesanan',
                //     //'suffix' => '.ab',
                // ],
                // '<alias:lihat-keranjang>|index|side-kategori|cek-pemesanan' => 'site/<alias>',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    // ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
