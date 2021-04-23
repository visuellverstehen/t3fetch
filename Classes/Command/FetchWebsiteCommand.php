<?php

namespace VV\T3fetch\Command;

use TYPO3\CMS\Core\Core\Environment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchWebsiteCommand extends Command
{
    // File extensions to reject
    const REJECT = 'mp4,mov,pdf,jpg,png';

    /**
     * Configure the command by defining the name, options and arguments
     */
    protected function configure()
    {
        $this
            ->setDescription('Fetches a website (including all subpages), so the TYPO3 cache gets filled.')
            ->addArgument(
                'baseUrl',
                InputArgument::REQUIRED,
                'The base url.'
            );;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fetchDirectory = Environment::getPublicPath() . '/typo3temp/t3fetch';

        // Remove fetch directory
        exec('rm -rf ' . $fetchDirectory);

        // Create fetch directory
        exec('mkdir -p ' . $fetchDirectory);

        // Fetch website recursively
        exec('wget --delete-after -q -r ' . $input->getArgument('baseUrl') . ' -R "' . self::REJECT . '" -P ' . $fetchDirectory, $output, $status);

        return $status;
    }
}
