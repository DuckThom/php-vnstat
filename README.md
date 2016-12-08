# php-vnstat
vnstat json output parser for PHP

## Usage

```php
use Luna\Vnstat\Vnstat;

class YourClass extends Awesomeness implements Ideas
{
  public function doSomething()
  {
    $interface = 'eth0';
    
    $jsonObject = Vnstat::get($interface);
  }
}
```

## Parameters

```php
Vnstat::get(string $interface)
```

## Return values

```php
Vnstat::get($interface)
```

Returns `stdClass` on success.

## Errors/Exceptions

Throws `Luna\Vnstat\Exceptions\InvalidJsonException` if the json string returned by vnstat was not parsable to an object.

Throws `\Symfony\Component\Process\Exception\ProcessFailedException` if `which vnstat` failed.

Throws `\Symfony\Component\Process\Exception\ProcessFailedException` if `vnstat --query --json -i $interface` failed.
