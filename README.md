# ShipperHQ and WebShopApps MatrixRate

A Shipping Rate module for Magento 2.x which supports showing multiple shipping methods.  This is based on the Magento Tablerate module and is managed via a csv file.

## Installation

Installation is via composer.

To install, go to the root folder of your Magento installation and type 
  composer require webshopapps/module-matrixrate
Once composer has completed downloading run
  php -f bin/magento setup:upgrade


## Resources
* [View Source on GitHub][code]
* [Report Issues on GitHub][issues]

[code]: https://github.com/webshopapps/m2ShipperHQ
[issues]: https://github.com/webshopapps/m2ShipperHQ/issues

## Usage Examples

## Tests


## Supported Versions
This library aims to support and is [tested against][travis] the following PHP
implementations:

* PHP 5.5
* PHP 5.6
* PHP 5.7
enforced in the composer.json

## Credits

This extension borrows heavily from the Tablerate capability in Magento2.  In order to keep codebase as bug-free and
conformant as possible the tablerate code is used in preference to writing from scratch.  This hopefully also
allows for easier understanding by users.

We would like to acknowledge and thank the Magento 2 Development team for making their codebase open for such use.

The composer structure is taken from various sources, most heavily using structure from https://github.com/sjparkinson/static-review.

Assistance around composer, Magento2 structure, etc was also taken from these sources:

* [https://github.com/Genmato/MultiStoreSearchFields](http://)
* [https://alankent.wordpress.com/2014/08/03/creating-a-magento-2-composer-module/](http://)
* [https://github.com/SchumacherFM/mage2-advanced-rest-permissions](http://)


## License
Copyright (c) 2015 Zowta LLC & Zowta Ltd. See [LICENSE][] for
details.

We also dutifully respect the [Magento][] OSL license, which is included in this codebase.


[license]: LICENSE.md
[magento]: Magento2_LICENSE.md
