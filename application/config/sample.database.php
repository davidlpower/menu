<?php defined('SYSPATH') or die('No direct access allowed.');

//Enter database, user & password 
return array
(
    'default' => array
    (
        'type'       => 'mysql',
        'connection' => array(
            'hostname'   => 'localhost',
            'database'   => '',
            'username'   => '',
            'password'   => '',
            'persistent' => FALSE,
        ),
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => FALSE,
        'profiling'    => TRUE,
    )
);
