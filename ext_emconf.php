<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Override backend login template',
    'description' => '',
    'category' => 'backend',
    'author' => 'Georg Ringer',
    'author_email' => 'gre@studiomitte.com',
    'author_company' => 'StudioMitte',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'StudioMitte\\BackendLogin\\' => 'Classes'
        ]
    ],
];
