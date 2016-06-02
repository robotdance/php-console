# PHP-Console

[![Code Climate](https://codeclimate.com/github/robotdance/php-console/badges/gpa.svg)](https://codeclimate.com/github/robotdance/php-console)
[![Test Coverage](https://codeclimate.com/github/robotdance/php-console/badges/coverage.svg)](https://codeclimate.com/github/robotdance/php-console/coverage)
[![Issue Count](https://codeclimate.com/github/robotdance/php-console/badges/issue_count.svg)](https://codeclimate.com/github/robotdance/php-console)

PHP-Console is an utility class for console output.

## Examples

```php
use robotdance/Console;
...
echo Console::red('Bob is going home', 'red'); // red text
echo Console::apply('Bob is going home', ['red', 'bold']); // red and bold text
echo Console::indent('Bob is going home', 4, 2); two levels of identation
}
```
Please take a look at the source comments and generate docs through PHPDocumentor to learn more.

## Setup

PHP-Console uses [Composer](https://getcomposer.org/) as dependency manager.

`$ composer install`

You may also generate documentation:

`$ ./bin/phpdoc -d ./src/ -t ./docs/`

## Testing

`$ ./bin/phpunit`

## Contribute

Fork, code your tests and modifications, write a good commit message and submit a pull request.
All tests must pass and the coverage must remains at 100%.

## References

[PHP the right way](http://www.phptherightway.com)
