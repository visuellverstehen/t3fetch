<?php

namespace VV\T3fetch\Command;

use TYPO3\CMS\Extbase\Mvc\Controller\CommandController;

class FetchWebsiteCommandController extends CommandController
{
    /**
     * @param string $baseUrl
     */
    public function fetchAllCommand($baseUrl)
    {
        $fetchDirectory = PATH_site . 'typo3temp/t3fetch';

        // Remove fetch directory
        $this->exec('rm -r ' . $fetchDirectory);

        // Create fetch directory
        $this->exec('mkdir ' . $fetchDirectory);

        // Fetch website recursively
        $this->exec('wget -q -r ' . $baseUrl . ' -P ' . $fetchDirectory);
    }

    /**
     * @param string $command
     */
    private function exec($command)
    {
        exec($command, $output);
        $this->output(implode("\n", $output));

        // Removes % at the end of the output
        $this->outputLine("\r");
    }
}
