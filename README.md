# ShipperHQ and WebShopApps MatrixRate
A Shipping Rate module for Magento 2.3+ which supports showing multiple shipping methods. This is based on the Magento Tablerate module and is managed via a csv file.

Facts
-----
- [extension on GitHub](https://github.com/webshopapps/module-matrixrate)
- Magento v1.0 available for download from www.webshopapps.com

Description
-----------
The MatrixRate shipping extension is the original Magento solution that enables you to offer multiple shipping options to customers based on their locations. With MatrixRate you can define different shipping rates according to destination, shipping method and the weight, price or quantity of an item.

Compatibility
-------------
- Magento >= 2.3

This library aims to support and is tested against the following PHP
implementations:

* PHP 7.1.3
* PHP 7.2.0
* PHP 7.3.0

per the [official Magento 2 requirements](https://devdocs.magento.com/guides/v2.3/install-gde/system-requirements-tech.html)

Installation Instructions
-------------------------
Install using composer by adding to your composer file using commands:
```
$ composer require webshopapps/module-matrixrate
$ composer update
$ bin/magento setup:upgrade
```

Configuration
-------------------------
MatrixRate is completely CSV driven, no coding required to change prices, add rates, etc
It allows multiple postage rates to be displayed for the customer to choose in particular country/city/region/ZIP code/condition range, where condition can be weight, price or #items. The management of shipping rates is done via a CSV file, which is uploaded to the database. Shipping calculations are then done via SQL searches, providing efficient results. 

To get started you will need to: 

1. Create your CSV file of shipping rates. Please follow [the format of the CSV file described in our online docs](https://docs.shipperhq.com/matrixrates-csv-configuration). We also have [many example CSVs](https://docs.shipperhq.com/matrixrates-examples-city-based)  to get you started
2. Import the CSV file by [following the instructions in our online docs](https://docs.shipperhq.com/1878-2/#How_to_Upload_a_CSV_File)


Full instructions are also available in our [online documentation](http://docs.shipperhq.com/installing-the-magento-2-webshopapps-matrixrate-extension/).

Support
-------
For further information on using Matrixrates, please refer to our [online documentation](http://docs.shipperhq.com/category/troubleshooting/ecommerce-platform/matrixrates/).
If you have any issues with this extension, open an issue on [GitHub](https://github.com/webshopapps/module-matrixrate/issues). Alternatively you can contact us via email at support@webshopapps.com or via our website http://webshopapps.com/contacts/
 

WebShopApps MatrixRates is provided AS IS and we are not accepting feature requests at this time. Extended functionality is available via [ShipperHQ](https://www.shipperhq.com).

Magento Issues Impacting MatrixRates
-------
1. Magento v2.1.3 - Website specific shipping rates or configuration are not working - you may not see any rates when placing an order via the admin panel
    - Github Issue: https://github.com/magento/magento2/issues/7840
    - Related Issue: https://github.com/magento/magento2/issues/7943
    - Code change required to fix: https://github.com/magento/magento2/issues/7943#issuecomment-269508822
2. Only country, region and postcode are included in shipping request at checkout - you may not see correct rates returned if filtering on city or PO box addresses
    - Github Issue: https://github.com/magento/magento2/issues/3789
    - Resolved in Magento 2.1 and above for Guest checkout, logged in customers will still only see region/state, postcode and country
3. Error thrown when placing an order with some shipping methods. Root cause is that some shipping methods have shipping method codes longer than the column length on quote for shipping_method field. Field is truncating the code and order cannot be placed. 
   - Github Issue: https://github.com/magento/magento2/issues/6475
 
Credits
---------
This extension borrows heavily from the Tablerate capability in Magento2.  In order to keep codebase as bug-free and
conformant as possible the tablerate code is used in preference to writing from scratch.  This hopefully also
allows for easier understanding by users.

We would like to acknowledge and thank the Magento 2 Development team for making their codebase open for such use.

The composer structure is taken from various sources, most heavily using structure from https://github.com/sjparkinson/static-review.

Assistance around composer, Magento2 structure, etc was also taken from these sources:

* [https://github.com/Genmato/MultiStoreSearchFields](http://)
* [https://alankent.wordpress.com/2014/08/03/creating-a-magento-2-composer-module/](http://)
* [https://github.com/SchumacherFM/mage2-advanced-rest-permissions](http://)

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

License
-------
Copyright (c) 2020 Zowta LLC & Zowta Ltd. See [LICENSE][] for details.

We also dutifully respect the [Magento][] OSL license, which is included in this codebase.


[license]: LICENSE.md
[magento]: Magento2_LICENSE.md

Copyright
---------
Copyright (c) 2020 Zowta LLC & Zowta Ltd.


