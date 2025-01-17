<?php

namespace VV\T3fetch\Command;

use TYPO3\CMS\Core\Core\Environment;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
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
            )
            ->addOption(
                'limit',
                null,
                InputOption::VALUE_REQUIRED,
                'The value for wget --limit-rate parameter.',
                '1000k'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $fetchDirectory = Environment::getPublicPath() . '/typo3temp/t3fetch';

        // Remove fetch directory
        exec('rm -rf ' . $fetchDirectory);

        // Create fetch directory
        exec('mkdir -p ' . $fetchDirectory);

        // Fetch website recursively
        exec('wget --delete-after -q -r ' . $input->getArgument('baseUrl') . ' --limit-rate ' . $input->getOption('limit') . ' -R "' . self::REJECT . '" -P ' . $fetchDirectory, $output, $status);

        return $status;
    }
}
