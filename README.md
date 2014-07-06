# Blendle #
- - -
## Installation

Installatie via de composer
```sh
php composer.phar require nickurt/blendle:dev-master
```

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

### MeRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client        	=   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$authorization 	=   new \Blendle\Model\Authorization();
$authorization->setToken('dSwD*xFss8df58s7dfsdfd77872');

$request       	=   new \Blendle\Request\MeRequest();
$request->setAuthorization($authorization);

$response      	=   $client->send($request);
print_r($response->getUsername()); 
```
### PopularRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client     	= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$response 		=	$client->send(new \Blendle\Request\PopularRequest());

foreach($response->getItem() as $items) {
	print_r($items->getTitle());
}
```

### RealtimeRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$response		=	$client->send(new \Blendle\Request\RealtimeRequest());

foreach($response->getItem() as $items) {
	print_r($items->getTitle());
}
```


### ItemRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

$item			=	new \Blendle\Model\Item();
$item->setId('bnl-trn-20140705-3353927');

$request		=	new \Blendle\Request\ItemRequest();
$request->setItem($item);

$reponse		=	$client->send($request);
print_r($reponse->getTitle());
```

### UserPostsRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client 		= 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

$request 		=	new \Blendle\Request\UserPostsRequest();
$request->setUsername('marten');
$response 		=	$client->send($request);

foreach($response->getItem() as $items) {
    print_r($items->getTitle());
}
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
Thanks to [Blendle](https://blendle.nl)