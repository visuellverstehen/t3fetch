<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3fetch',
    'description' => 'Fetches a website (including all subpages), so the TYPO3 cache gets filled.',
    'category' => 'be',
    'author' => 'visuellverstehen',
    'author_email' => 'kontakt@visuellverstehen.de',
    'author_company' => 'visuellverstehen',
    'state' => 'stable',
    'clearCacheOnLoad' => false,
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
        ]
    ]
];
