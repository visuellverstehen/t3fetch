<?php

namespace VV\T3fetch\Command;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Http\RequestFactory;

/**
 * Inspired by https://github.com/schliesser/sitecrawler/
 */
class FetchWebsiteCommand extends Command
{
    protected array $urls = [];

    protected function configure()
    {
        $this
            ->setDescription('Fetches a website (including all subpages), so the TYPO3 cache gets filled.')
            ->addArgument(
                'baseUrl',
                InputArgument::REQUIRED,
                'The absolute url pointing to the sitemap.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (GeneralUtility::isValidUrl($input->getArgument('baseUrl')) === false ||
            strpos($input->getArgument('baseUrl'), 'sitemap.xml') === false
        ) {
            return Command::FAILURE;
        }

        $this->processSitemap($input->getArgument('baseUrl'));
        $this->processUrls();

        return Command::SUCCESS;
    }

    protected function processSitemap(string $url): void
    {
        if (GeneralUtility::isValidUrl($url) === false ||
            (strpos($url, 'sitemap.xml') === false && strpos($url, '1533906435') === false)
        ) {
            throw new \Exception('URL ' . $url . ' is not valid');
        }

        $requestFactory = GeneralUtility::makeInstance(RequestFactory::class);
        $response = $requestFactory->request($url, 'GET');
        $xml = simplexml_load_string($response->getBody()->getContents());
        $sitemap = json_decode(json_encode($xml), true) ?: [];

        if (array_key_exists('sitemap', $sitemap)) {
            foreach ($sitemap['sitemap'] as $item) {
                $this->processSitemap($item['loc']);
            }
        }

        if (array_key_exists('url', $sitemap)) {
            $this->urls += array_map(fn ($item) => $item['loc'], $sitemap['url']);
        }
    }

    protected function processUrls(): void
    {
        array_walk(array_unique($this->urls), function($url) {
            GeneralUtility::makeInstance(RequestFactory::class)
                ->request($url, 'HEAD', [
                    'headers' => [
                        'User-Agent' => 't3fetch crawler',
                    ]
                ]);
        });
    }
}
