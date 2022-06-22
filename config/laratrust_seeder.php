<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'writer' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u',
        ],
        'incubator' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'csr' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'bootcamp' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'elite' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'vbc' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'meetups' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'teachers' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'services' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'digitalmarketing' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
