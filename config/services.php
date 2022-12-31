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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('pk_test_51MGxFrSHwzaCjtwhH0QlHFMz4IMUqpKRYqf3PYJvjpuBcx95QbEFsk0Q4ceSmta6hK7CE1Gm5fdZJBlYFkRsX9M600yp2AUaov'),
        'secret' => env('sk_test_51MGxFrSHwzaCjtwhWcCIqtoKGo5oxIn5b2JLTynAfE1KzlJrI0o772MGKmHPKId4sjH00lYV5u3sd70zUVLxi9x4009ytCHKAv'),
    ],
];
