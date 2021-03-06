<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=Careerbug',
            'username' => 'root',
            'password' => 'colourfade',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'sendGrid' => [
           'class' => 'bryglen\sendgrid\Mailer',
           'username' => 'kriti_swagatika',
           'password' => 'kriti@2705',
           ////'viewPath' => '@app/views/mail', // your view path here
           ],
    ],
];
