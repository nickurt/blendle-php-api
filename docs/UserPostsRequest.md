### UserPostsRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client             = 	new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

$request            =	new \Blendle\Request\UserPostsRequest();
$request->setUsername('marten');

$response           =   $client->send($request);
print_r($response);

//  Blendle\Model\UserPosts Object
//  (
//      [items:protected] => Array
//      (
//          [0] => Blendle\Model\Item Object
//              (
//                  [acquired:protected] => 
//                  [id:protected] => bnl-par-20141223-3811310
//                  [price:protected] => 
//                  [refundable:protected] => 
//                  [date:protected] => 2014-12-23T00:00:00+00:00
//                  [format_version:protected] => 5
//                  [url:protected] => https://ws.blendle.nl/user/marten/post/bnl-par-20141223-3811310?manifest=true
//                  [title:protected] => Slim programma scoort kaartjes
//                  [body:protected] => 
//                  [words:protected] => 
//              )
//          [..]
//      )
//  )

foreach($response->getItem() as $items) {
    print_r($items);
    
    //  Blendle\Model\Item Object
    //  (
    //      [acquired:protected] => 
    //      [id:protected] => bnl-par-20141223-3811310
    //      [..]
    //  )
   
    print_r($items->getTitle());
    
    //  Slim programma scoort kaartjes
}
```