### ItemRequest

```php
<?php
require_once __DIR__.'/../vendor/autoload.php';

$client             =   new \Blendle\Client\StandardClient(new \Blendle\Options\StandardBlendleOptions());

$item               =   new \Blendle\Model\Item();
$item->setId('bnl-trn-20140705-3353927');

$request            =   new \Blendle\Request\ItemRequest();
$request->setItem($item);

// Authorization to read the whole article (if you have paid it!)?
// Default the Authorization Token will be saved in a cookie after the AuthRequest
$request->setAuthorization(new \Blendle\Model\Authorization());

$reponse            =   $client->send($request);
print_r($reponse);

//  Blendle\Model\Item Object
//  (
//      [acquired:protected] => 
//      [id:protected] => bnl-trn-20140705-3353927
//      [price:protected] => 0.25
//      [refundable:protected] => 
//      [date:protected] => 2014-07-05T00:00:00+00:00
//      [format_version:protected] => 4
//      [url:protected] => https://ws.blendle.nl/item/bnl-trn-20140705-3353927
//      [title:protected] => Mijn leven is een prachtige expeditie René van der Gijp
//      [body:protected] => Array
//      (
//          [0] => René van der Gijp (Dordrecht, 1961) is oud-profvoetballer en voetbalanalist. [..]
//          [1] => I Gij zult geen andere goden voor mijn aangezicht hebben
//          [2] => "Er is vast wel iets, maar daar ga ik me toch niet mee bezig houden, ouwe reus? [..]
//      )

//      [words:protected] => 2333
//  )

print_r($response->getTitle());
//  Mijn leven is een prachtige expeditie René van der Gijp
```