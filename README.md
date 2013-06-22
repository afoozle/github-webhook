github-webook - Github Webhook parsing for PHP 5.3+ [![Build Status](https://secure.travis-ci.org/afoozle/github-webhook.png)](http://travis-ci.org/afoozle/github-webhook)
==============================

Github-Webhook is a simple library to help parse webhook payloads from
github. ( https://help.github.com/articles/post-receive-hooks )

This library on it's own does not do anything in particular, it simply
provides a convenient method for parsing post receive hook data into
a standard structure.

Installation
------------

Install via packagist/composer: https://packagist.org/packages/afoozle/github-webhook

Usage
-----

```php
<?php
use afoozle\GithubWebhook\EntityMapper\PayloadMapper;

$payloadMapper = new PayloadMapper($payload);

$payload = $payloadMapper->mapFromJson($yourJsonFormattedData);
// or
$payload = $payloadMapper->mapFromDataArray($yourArrayOfData);

var_dump($payload);
```

About
=====

Requirements
------------

- Any flavor of PHP 5.3 or above should do
- [optional] PHPUnit 3.5+ to execute the test suite (phpunit --version)

Submitting bugs and feature requests
------------------------------------

Bugs and feature request are tracked on [GitHub](https://github.com/afoozle/github-webhook/issues)

Author
------

Matthew Wheeler - <matt@yurisko.net> - <http://twitter.com/afoozle><br />

License
-------

Github-Webhook is licensed under the MIT License - see the `LICENSE.txt` file for details
