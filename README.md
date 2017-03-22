# RxPHP operators for PHP 7

[![Build Status](https://travis-ci.org/php-api-clients/rx-operators.svg?branch=master)](https://travis-ci.org/php-api-clients/rx-operators)
[![Latest Stable Version](https://poser.pugx.org/api-clients/rx-operators/v/stable.png)](https://packagist.org/packages/api-clients/rx-operators)
[![Total Downloads](https://poser.pugx.org/api-clients/rx-operators/downloads.png)](https://packagist.org/packages/api-clients/rx-operators)
[![Code Coverage](https://scrutinizer-ci.com/g/php-api-clients/rx-operators/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/php-api-clients/rx-operators/?branch=master)
[![License](https://poser.pugx.org/api-clients/rx-operators/license.png)](https://packagist.org/packages/api-clients/rx-operators)
[![PHP 7 ready](http://php7ready.timesplinter.ch/php-api-clients/rx-operators/badge.svg)](https://travis-ci.org/php-api-clients/rx-operators)

# Installation

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require api-clients/rx-operators 
```
# Usage

Decoding:
```php
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

$observable = Observable::fromArray(['{"foo":"bar"}']);
$promise = resolve($observable);

/**
 * Will decode into:
 * [
 *   'foo' => 'bar',
 * ]
 */
$observable->_ApiClients_jsonDecode()->subscribeCallback(function ($d) {
    var_export($d);
});
```

Encoding:
```php
use function ApiClients\Tools\Rx\unwrapObservableFromPromise;

$observable = Observable::fromArray([[
    'foo' => 'bar',
]]);
$promise = resolve($observable);

/**
 * Will encode into:
 * {"foo":"bar"}
 */
$observable->_ApiClients_jsonEncode()->subscribeCallback(function ($d) {
    echo $d;
});
```

# License

The MIT License (MIT)

Copyright (c) 2017 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
