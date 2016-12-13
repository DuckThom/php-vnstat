# php-vnstat
vnstat json output parser for PHP

[![StyleCI](https://styleci.io/repos/75982156/shield?branch=master)](https://styleci.io/repos/75982156)
[![License](https://poser.pugx.org/luna/vnstat/license?format=flat-square)](https://packagist.org/packages/luna/vnstat)
[![Total Downloads](https://poser.pugx.org/luna/vnstat/downloads?format=flat-square)](https://packagist.org/packages/luna/vnstat)

## Usage

```php
use Luna\Vnstat\Vnstat;

class YourClass extends Awesomeness implements Ideas
{
  protected $interface = 'eth0';

  public function runWithStaticMethod()
  {    
    $jsonObject = Vnstat::get($this->interface);
  }
  
  public function runWithNewInstance()
  {
    $vnstat = new Vnstat($this->interface);
    $vnstat->run();
    
    $rawJson = $vnstat->getJson();
    $response = $vnstat->getResponse();
  }
}
```

## Methods

```php
public function Vnstat::__construct(string $interface): void
```

```php
public function Vnstat::get(string $interface): \Luna\Vnstat\VnstatResponse
```

```php
public function Vnstat::getResponse(): \Luna\Vnstat\VnstatResponse
```

```php
public function Vnstat::setExecutablePath(string $executable): $this
```

```php
public function Vnstat::getExecutablePath(): string
```

```php
public function Vnstat::setJson(string $json): $this
```

```php
public function Vnstat::getJson(): string
```

## Errors/Exceptions

Throws `Luna\Vnstat\Exceptions\InvalidJsonException` if the string returned by `Vnstat::getJson()` was an invalid json string.

Throws `Luna\Vnstat\Exceptions\ExecutableNotFoundException` if `which vnstat` failed.

Throws `\Symfony\Component\Process\Exception\ProcessFailedException` if `vnstat --query --json -i $interface` failed.
