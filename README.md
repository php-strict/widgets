# Widgets

[![Software License][ico-license]](LICENSE.txt)

Widgets mechanism allow widgets consumer gets widgets from widgets 
provider and place any widgets in predefined places. Widgets consumer 
ask widgets provider for widgets for specific scope/place, throught 
provider public interface. Or widgets provider can take consumer-object 
as parameter and inject widgets into it. For this purposes widgets 
consumer define public methods to gets current scope and all places 
for current scope.

Widgets providers works with widgets data storage. Widgets data storage 
stores information about widgets scope, place and some widget type 
dependent parameters. Widgets provider refers to the widgets producers, 
that are encapsulated in widgets data, for creating the widgets.

Widgets producer takes widgets data and create widget. Widgets 
producer may be a standalone (weather, currency, ...), or a part of 
some module (for example - last news for news module).

## Requirements

*   PHP >= 7.1

## Install

Install with [Composer](http://getcomposer.org):

*   widgets consumer
    
```bash
composer require php-strict/widgets-consumer
```

*   widgets provider
    
```bash
composer require php-strict/widgets-provider
```

*   widgets producer
    
```bash
composer require php-strict/widgets-producer
```

## Usage

Extend abstract class WidgetsProvider or create your own class, implements WidgetsProviderInterface:

```php
use PhpStrict\WidgetsProvider
```

See examples dir.

## Tests

To execute the test suite, you'll need [Codeception](https://codeception.com/).

```bash
vendor\bin\codecept run
```

[ico-license]: https://img.shields.io/badge/license-GPL-brightgreen.svg?style=flat-square
