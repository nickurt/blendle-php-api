<?php
chdir(__DIR__);
$previousDir = '.';
while (!is_dir($previousDir . DIRECTORY_SEPARATOR . 'vendor')) {
    $appRoot = dirname(getcwd());

    if ($previousDir === $appRoot) {
        throw new RuntimeException('Unable to locate application root');
    }

    $previousDir = $appRoot;
    chdir($appRoot);
}

$loader = require $appRoot . '/vendor/autoload.php';

if (! isset($loader)) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$loader->add('Blendle\\', __DIR__);