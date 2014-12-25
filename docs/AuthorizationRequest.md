### AuthorizationRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client             =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());
$request            =   new \Blendle\Request\AuthorizationRequest();
$request->setUsername('username');
$request->setPassword('password');

$response           =   $client->send($request);
print_r($response);

//  Blendle\Model\Authorization Object
//  (
//      [token:protected] => dSwD*xFss8df58s7dfsdfd77872
//  )

print_r($response->getToken());
//  dSwD*xFss8df58s7dfsdfd77872
```