<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'clients' => 'c,r,u,d',
            'employes' => 'c,r,u,d',
            'fournisseurs' => 'c,r,u,d',
            'catagories' => 'c,r,u,d',
            'produits' => 'c,r,u,d',
            'achat' => 'c,r,u,d',
            'livrisons' => 'c,r,u,d',

        ],
        'admin' => [

        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
