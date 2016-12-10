# php-vnstat
vnstat json output parser for PHP

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
    $jsonObject = $vnstat->run();
  }
}
```

## Methods

```php
public function Vnstat::__construct(string $interface): void
```

```php
public function Vnstat::get(string $interface): \stdClass
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
public function Vnstat::getJson(): \stdClass
```

## Errors/Exceptions

Throws `Luna\Vnstat\Exceptions\InvalidJsonException` if the json string returned by vnstat was not parsable to an object.

Throws `Luna\Vnstat\Exceptions\ExecutableNotFoundException` if `which vnstat` failed.

Throws `\Symfony\Component\Process\Exception\ProcessFailedException` if `vnstat --query --json -i $interface` failed.
