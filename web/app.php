<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

/*
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

$env = getenv('SYMFONY_ENV') ? getenv('SYMFONY_ENV') : 'prod';
$debug = getenv('SYMFONY_DEBUG') ? (getenv('SYMFONY_DEBUG') === 'false' ? false : true) : false;

if ($debug) {
    Debug::enable();
}

if ($env != 'dev') {
    $apcLoader = new Symfony\Component\ClassLoader\ApcClassLoader($env.'.sylius', $loader);
    $loader->unregister();
    $apcLoader->register(true);
}

$kernel = new AppKernel($env, $debug);
$kernel->loadClassCache();
$kernel = new AppCache($kernel);

Request::enableHttpMethodParameterOverride();
Request::setTrustedHeaderName(Request::HEADER_FORWARDED, null);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
