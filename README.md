[![Actions](https://github.com/visuellverstehen/t3fetch/workflows/TER/badge.svg)](https://github.com/visuellverstehen/t3fetch/actions)
[![Downloads](https://img.shields.io/packagist/dt/visuellverstehen/t3fetch.svg)](https://packagist.org/packages/visuellverstehen/t3fetch)

# t3fetch
Fetches a website (including all subpages), so the TYPO3 cache gets filled.

## How to use
1. Install TYPO3 extension via [composer](https://packagist.org/packages/visuellverstehen/t3fetch), [TER](https://extensions.typo3.org/extension/t3fetch/) or download and install manually.
2. Call command `fetchWebsite:fetchAll` via CLI or add scheduler task (_Execute console commands_ and then select `fetchWebsite:fetchAll`).

## Requirements
- Wget needs to be installed.
