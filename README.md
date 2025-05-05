[![Downloads](https://img.shields.io/packagist/dt/visuellverstehen/t3fetch.svg)](https://packagist.org/packages/visuellverstehen/t3fetch)

# t3fetch
Fetches a website based on the sitemap, so the TYPO3 cache gets filled.

## How to use
1. Install TYPO3 extension via [composer](https://packagist.org/packages/visuellverstehen/t3fetch)
2. Call command `fetchWebsite:fetchAll` via CLI or add scheduler task (_Execute console commands_ and then select `fetchWebsite:fetchAll`).
3. Set the `baseUrl` parameter to point to your Sitemap e.g.: https://example.org/sitemap.xml

## Requirements
- [`php-simplexml`](https://www.php.net/manual/de/book.simplexml.php) needs to be installed.
