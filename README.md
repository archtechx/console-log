# console-log

A tiny package that adds a `consoleLog()` method to Livewire. This method sends any data to the browser developer console.

## Installation

Require the package via composer:

```bash
composer require leanadmin/console-log
```

Add this to your base layout:

```html
<x-lean::console-log />
```

By default, events will only show up if your application is in the `local` environment. If you wish to change that, pass an `environment` attribute to the component:

```html
<x-lean::console-log environment="local" />

<x-lean::console-log :environment="['local', 'staging']" />
```

## Usage

In any Livewire component, you can use the `consoleLog()` method to log a value (or values) to the browser console:

```php
$this->consoleLog('foo');
$this->consoleLog($value);

$this->consoleLog('foo', 'bar');
$this->consoleLog($values);
```

## IDE support

Since the package adds a macro, you will not have IDE autosuggest for the `consoleLog()` method by default.

However, if you wish to add it, simply use the `ConsoleLog` trait:

```php
use Lean\ConsoleLog\ConsoleLog;

class MyComponent extends Component
{
    use ConsoleLog;
}
```

This trait has a `@method` annotation which lets your IDE understand the method.
