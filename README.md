# WebShopApps MatrixRate



## Installation

Installation is via composer.

Add the following to the composer.json file in your magento root directory:

        "webshopapps/mage2-matrixrate": "dev-master"
        
You also need to specify the repository:
 
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/webshopapps/mage2-matrixrate.git"
        }
    ]


## Resources
* [View Source on GitHub][code]
* [Report Issues on GitHub][issues]

[code]: https://github.com/webshopapps/mage2-matrixrate
[issues]: https://github.com/webshopapps/mage2-matrixrate/issues

## Usage Examples

## Tests


## Supported Versions
This library aims to support and is [tested against][travis] the following PHP
implementations:

* PHP 5.4

It has been developed against Magento 2 0.42.0-beta3 but should work against later versions. The version is not
enforced in the composer.json

## Credits

This extension borrows heavily from the Tablerate capability in Magento2.  In order to keep codebase as bug-free and
conformant as possible the tablerate code is used in preference to writing from scratch.  This hopefully also
allows for easier understanding by users.

We would like to acknowledge and thank the Magento 2 Development team for making their codebase open for such use.

The composer structure is taken from various sources, most heavily using structure from https://github.com/sjparkinson/static-review.

Assistance around composer, Magento2 structure, etc was also taken from these sources:

* https://github.com/Genmato/MultiStoreSearchFields
* https://alankent.wordpress.com/2014/08/03/creating-a-magento-2-composer-module/
* https://github.com/SchumacherFM/mage2-advanced-rest-permissions


## License
Copyright (c) 2015 Zowta LLC & Zowta Ltd. See [LICENSE][] for
details.

We also dutifully respect the [Magento][] OSL license, which is included in this codebase.


[license]: LICENSE.md
[magento]: Magento2_LICENSE.md
