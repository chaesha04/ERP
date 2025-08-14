<?php

return [

    'defaults' => [
        'guard' => 'employee', // guard default
        'passwords' => 'employees',
    ],

    'guards' => [
        // default guard untuk employee login
        'employee' => [
            'driver' => 'session',
            'provider' => 'employees',
        ],
        // guard bawaan Laravel untuk keperluan umum (wajib tetap ada)
        'web' => [
            'driver' => 'session',
            'provider' => 'employees', // gunakan provider employees jika memang hanya pakai Employee
        ],
    ],

    'providers' => [
        'employees' => [
            'driver' => 'eloquent',
            'model' => App\Models\Employee::class,
        ],
    ],

    'passwords' => [
        'employees' => [
            'provider' => 'employees',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
