<?php
/**
 * Created by PhpStorm.
 * User: danilosantos@conder.intranet
 * Date: 10/05/17
 * Time: 14:45
 */
return [
    'doctrine' => [
        'orm' => [
            'auto_generate_proxy_classes' => false,
            'proxy_dir'                   => 'data/cache/EntityProxy',
            'proxy_namespace'             => 'EntityProxy',
            'underscore_naming_strategy'  => true,
        ],
        'connection' => [
            'orm_default' => [
                'driver'   => 'pdo_mysql',
                'dbname'   => 'demoDb',
                'user'     => 'demoUser',
                'password' => 'demoPass',
                'host'     => 'db_e_skeleton',
                'charset'  => 'UTF8',
            ],
        ],
        'annotation' => [
            'metadata' => [
                'src/App/Entity'
            ],
        ],
    ],
];