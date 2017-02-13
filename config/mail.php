<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp2.uepg.br'),
    'port' => env('MAIL_PORT', 25),
    'from' => ['address' => '15063026@uepg.br', 'name' => 'pdes'],
    'encryption' => env('MAIL_ENCRYPTION', ''),
    'username' => env('mailluisthiago@gmail.com'),
    'password' => env('luis1111'),
    'sendmail' => '/usr/sbin/sendmail -bs',

];