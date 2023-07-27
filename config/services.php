<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */


    'facebook' => [
        'client_id' => '291004160160413',
        'client_secret' => '4709e7b86351e44bb70a10d91bb9e42a',
        'redirect' => 'http://localhost:8000/callback',
    ],

    'google' => [
        'client_id' => '136516454406-ajh2bodu08v3d7u3cq64k83ob1f5mkqi.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
