<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '2098469773514541',
        'client_secret' => 'f3e09fc1d37e79acc51676804fafa535',
        'redirect' => 'https://localhost:8000/login/facebook/callback'
      ],
    'google' => [
        'client_id' => '624448207994-h8fg13a0drmhf3mn4hp8dp9v668t3cn9.apps.googleusercontent.com',
        'client_secret' => '1l0MS2Vnq5vBT3ImH24hAhzZ',
        'redirect' => 'https://127.0.0.1:8000/login/google/callback'
      ],
];
