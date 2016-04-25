# ShipperHQ and WebShopApps MatrixRate

A Shipping Rate module for Magento 2.x which supports showing multiple shipping methods.  This is based on the Magento Tablerate module and is managed via a csv file.

## Installation

Installation is via composer.

Add the following to the composer.json file in your magento root directory:

    "webshopapps/mage2-matrixrate": "dev-master"
        
You also need to specify the repository:
 
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/webshopapps/m2ShipperHQ.git"
        }
    ]

You can now install the module via `composer update` from the root directory.

Finally you need to get the actual module loaded within Magento itself. In Magento 1.x you add a file to app/etc/modules.
  In Magento 2.x run the following command for each module you wish to enable
  php -f bin/magento module:enable --clear-static-content Module_Name
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

It has been developed against Magento 2 v2.0.0 but should work against later versions. The version is not
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
