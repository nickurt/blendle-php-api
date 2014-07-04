# Blendle #
=======

## Requirements

* PHP 5.4+

## Examples
### AuthorizationRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client       =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$request      =   new \Blendle\Request\AuthorizationRequest();
$request->setUsername('username');
$request->setPassword('password');

$response     =   $client->send($request);
print_r($response->getToken());
```

### UserRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client         =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$authorization  =   new \Blendle\Model\Authorization();
$authorization->setToken('dSwD*xFss8df58s7dfsdfd77872');

$request        =   new \Blendle\Request\UserRequest();
$request->setAuthorization($authorization);

$response       =   $client->send($request);
print_r($response->getUsername()); 
```

### StandardBlendleOptions
```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$options		=	new \Blendle\Options\StandardBlendleOptions();
$options->setBaseUrl('https://internal.blendle.nl');
$options->setMeUrl('https://internal.blendle.nl/me');
$options->setTokensUrl('https://internal.blendle.nl/tokens');
```

- - - 
Thanks to [https://blendle.nl](Blendle) 