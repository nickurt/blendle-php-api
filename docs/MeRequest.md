### MeRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client             =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

// Default the Authorization Token will be saved in a cookie after the AuthRequest, it can be
// manually set with setToken (\Blendle\Model\Authorization)
$request            =   new \Blendle\Request\MeRequest();
$request->setAuthorization(new \Blendle\Model\Authorization());

$response           =   $client->send($request);
print_r($response); 

//  Blendle\Model\Me Object
//  (
//      [id:protected] => nickurt
//      [username:protected] => Nickurt
//      [..]
//  )

print_r($response->getUsername());
//  nickurt
```