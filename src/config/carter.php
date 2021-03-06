<?php

return [

    'shopify' => [

        /*
         *  https://docs.shopify.com/api/authentication/oauth#get-the-client-redentials
         */
        'client_id'     => env('SHOPIFY_KEY'),
        'client_secret' => env('SHOPIFY_SECRET'),

        /*
         *  https://docs.shopify.com/api/authentication/oauth#scopes
         */
        'scopes'        => [
            'read_content',
            'read_themes',
            'read_products',
            'read_customers',
            'read_orders',
            'read_script_tags',
            'read_fulfillments',
            'read_shipping'
        ],

        /*
         *  https://docs.shopify.com/api/recurringapplicationcharge#create
         */
        'plan'          => [
            'name'       => 'Test Plan',
            'price'      => 0.99,
            'return_url' => env('APP_URL', 'http://localhost').'/activate',
            'trial_day'  => 0,
            'test'       => true
        ],

        'routes' => [
            'signup' => [
                'uri'    => 'signup',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@signupForm'
            ],

            'install' => [
                'uri'    => 'install',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@install'
            ],

            'register' => [
                'uri'    => 'register',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@register'
            ],

            'activate' => [
                'uri'    => 'activate',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@activate'
            ],

            'login' => [
                'uri'    => 'login',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@login'
            ],

            'dashboard' => [
                'uri'    => 'dashboard',
                'action' => '\Woolf\Carter\Http\Controllers\ShopifyController@dashboard'
            ],
        ]

    ]

];