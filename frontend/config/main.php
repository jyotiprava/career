<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
         //'facebook' => [
         //   'class' => 'yii\authclient\clients\Facebook',
         //   'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
         //   'clientId' => '1242867259079970',
         //   'clientSecret' => '5312039cebd9e34394846a36438ce667',
         // ],
              
               'google' => [
                      'class' => 'yii\authclient\clients\Google',
                      'clientId' => '843817468168-sfov950a5sd93k2ogv05b18vbihrue8p.apps.googleusercontent.com',
                      'clientSecret' => 'XAYFs_Tuh8uM6q2VFd-r7n5D',
                      'scope'=>' https://www.googleapis.com/auth/plus.profile.emails.read',
                  ],
       
        ],
      ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
