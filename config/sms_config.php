<?php

if (!defined('ADN_REGISTRATION_STATUS')) {
    define('ADN_REGISTRATION_STATUS', false);
}

if (!defined('ADN_REGISTRATION_BODY')) {
    define('ADN_REGISTRATION_BODY', 'This is default body');
}
if (!defined('ADN_REGISTRATION_DEFAULT_BODY')) {
    define('ADN_REGISTRATION_DEFAULT_BODY', 'This is default body');
}
return [
        'registration'=>[
            'status'=>true,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'password_reset'=>[
            'status'=>true,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'birthday'=>[
            'status'=>true,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'order_pending'=>[
            'status'=>false,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'order_processing'=>[
            'status'=>false,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'order_shipped'=>[
            'status'=>false,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'order_completed'=>[
            'status'=>false,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ],
        'order_cancelled'=>[
            'status'=>false,
            'body'=>'This is default body',
            'default_body'=>'This is default body'
        ]
];