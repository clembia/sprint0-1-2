<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'name'=>'Oratio Therapy System',  
       //Nome sulla NAVBAR
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'formatter' => [

            'dateFormat' => 'dd/MM/yyyy',

            'datetimeFormat' => 'php:d/m/Y H:i:s',

            'decimalSeparator' => ',',

            'thousandSeparator' => '.',

            'currencyCode' => 'EUR',
        ],
        'request' => [
            // !!! inserire una chiave segreta nel seguente campo - è richiesto per la validazione dei coocky
            'cookieValidationKey' => 'OEZV51vHTQjT59TWVAWH-dD6gE--Z2F_',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            //'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'class' => 'amnah\yii2\user\components\User',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'transport' => [
                //'class'=>'Swift_SmtpTransport',
                //'host' => 'smtp.mailtrap.io',
                //'username' => '4653f64f501b64',
                //'password' => '11ef642d896d1c',
                //'port'=> '2525',
                //'encryption' => 'tls'      
                'class'=>'Swift_SmtpTransport',
                'host' => 'smtp-relay.sendinblue.com',
                'username' => 'clemente.alfredo69@gmail.com',
                'password' => 'EHKU2ZhTf4Dcmng8',
                'port'=> '587',
                'encryption' => 'tls'   
            ],
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['clemente.alfredo69@gmail.com' => 'Admin'], // this is needed for sending emails
               'charset' => 'UTF-8',
            ]



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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
            // set custom module properties here ...
        ],
    ],
    'params' => $params,
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
