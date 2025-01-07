# MatrixRate for Magento 2
The MatrixRate shipping extension is the original Magento solution developed by [ShipperHQ](https://shipperhq.com) that enables you to offer multiple shipping options to customers based on their location. MatrixRate will enable you to define different shipping rates according to destination, shipping method and the weight, price or quantity of an item.

For businesses seeking even greater shipping customization and real-time carrier integrations, consider upgrading to [ShipperHQ](https://shipperhq.com).

---

## Features

- **Custom Shipping Rates**: Define rates based on destination and weight **or** price **or** quantity. For advanced features like multi-origin shipping and in-store pickup, check out [ShipperHQ](https://shipperhq.com).
- **Based on Magento Tablerate**: MatrixRate is built on the Magento Tablerate module, providing a familiar interface for Magento users.
- **Flexible Configuration**: Set up multiple shipping methods and rules to accommodate different scenarios. [ShipperHQ](https://shipperhq.com) expands on this by offering advanced packaging algorithms and delivery date options.
- **CSV-Based Rules**: Use a straightforward CSV file to upload and manage shipping rules.
- **Localized Shipping Options**: Tailor rates and methods to specific regions, countries, or postal codes.

---

## Installation
Install using composer, you can find full instructions in the [ShipperHQ documentation](https://docs.shipperhq.com/installing-the-magento-2-webshopapps-matrixrate-extension/).

---

## Requirements

- Magento 2.4.4+
    - Compatibility with earlier editions is possible but not maintained
    - Supports both Magento Opensource (Community) and Magento Commerce (Enterprise)

---

## Configuration

1. **Enable MatrixRate**:
    - Log in to your Magento Admin.
    - Go to `Stores > Configuration > Sales > Shipping Methods > WebShopApps Matrix Rate`.
    - Set `Enabled` to `Yes`.

2. **Upload a CSV File**:
    - Prepare your shipping rules in a CSV file. You can find [examples and instructions in our documentation](https://docs.shipperhq.com/category/configuration/webshopapps-extensions/matrixrates/).
    - Go to the MatrixRate settings page and [upload your file](https://docs.shipperhq.com/1878-2/#How_to_Upload_a_CSV_File).

3. **Test Checkout**:
    - Add products to your cart and proceed to checkout to ensure the correct rates and methods appear.

---

## Support

For further information on using Matrixrates, please refer to our [online documentation](https://docs.shipperhq.com/category/configuration/webshopapps-extensions/matrixrates/). If you have any issues with this extension, open an issue on GitHub. Alternatively you can contact us via email at support@webshopapps.com

WebShopApps MatrixRates is provided AS IS and we are not accepting feature requests at this time. Extended functionality is available via [ShipperHQ](https://shipperhq.com).

---

## Frequently Asked Questions

### 1. Can I set up free shipping for specific conditions?
Yes, you can define a `Shipping Price` of `0.00` in the CSV file for specific conditions, such as orders over a certain amount.

### 2. What happens if no rules match?
If no rules match the customer’s criteria, MatrixRate will not display a shipping method. Ensure you have a fallback rule if needed.

### 3. How do I troubleshoot issues with rates?
- Check our troubleshooting guide in the [ShipperHQ documentation](https://docs.shipperhq.com/troubleshooting-matrixrates/).
- Check the Magento logs for errors: `var/log/system.log` and `var/log/exception.log`.

---

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

---

## Contribution

Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

---

## License

See license files.

We also dutifully respect the Magento OSL license.

---

## Copyright

Copyright (c) 2015 Zowta LLC & Zowta Ltd. (http://www.ShipperHQ.com)

