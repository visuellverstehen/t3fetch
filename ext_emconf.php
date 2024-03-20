<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 't3fetch',
    'description' => 'Fetches a website based on the sitemap, so the TYPO3 cache gets filled.',
    'category' => 'be',
    'author' => 'visuellverstehen',
    'author_email' => 'hello@visuellverstehen.de',
    'author_company' => 'visuellverstehen',
    'state' => 'stable',
    'clearCacheOnLoad' => false,
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.0.0-12.4.99',
        ]
    ]
];
