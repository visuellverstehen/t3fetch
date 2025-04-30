<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3fetch',
    'description' => 'Fetches a website (including all subpages), so the TYPO3 cache gets filled.',
    'category' => 'be',
    'author' => 'visuellverstehen',
    'author_email' => 'hello@visuellverstehen.de',
    'author_company' => 'visuellverstehen',
    'state' => 'stable',
    'clearCacheOnLoad' => false,
    'version' => '1.6.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-13.4.99',
        ]
    ]
];