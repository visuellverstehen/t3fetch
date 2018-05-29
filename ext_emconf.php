<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3fetch',
    'description' => 'Fetches a website (including all subpages), so the TYPO3 cache gets filled.',
    'category' => 'be',
    'author' => 'visuellverstehen',
    'author_email' => 'kontakt@visuellverstehen.de',
    'author_company' => 'visuellverstehen',
    'state' => 'beta',
    'clearCacheOnLoad' => false,
    'version' => '0.1.1',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
        ]
    ]
];
