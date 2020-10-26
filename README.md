GloriaFood PHP API
==================

Composer ready PHP wrapper for the [GloriaFood API](https://github.com/GlobalFood/integration_docs).
 
## Installation

The recommended way to install the library is using [Composer](https://getcomposer.org).

1) Add this json to your composer.json file:
```json
{
    "require": {
        "gbro115/gloriafood-php": "<your-required-version>"
    }
}
```

2) Next, run this from the command line:
```
composer install
```
3) Finally, add this line to your php file that will be using the SDK:
```
require 'vendor/autoload.php';
```

## Functionality offered by this package

- Use this packaged to retrieve a menu from the GloriaFood Fetch Menu API
- Parse the JSON body of an Accepted Orders payload into a PHP object
 
## Handling Exceptions

If the API returns an error or an unexpected response, the PHP API will throw a \GloriaFood\Exception.

## Example usage

```php
<?php
require 'vendor/autoload.php';

$authKey = "SOURCED_FROM_WEB_APP";

$api = new \GloriaFood\GloriaFood($authKey);
$result = $api->fetchMenu()->fetchMenu();
print_r($result);
```
