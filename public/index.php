<?php

require '../vendor/autoload.php';

// initialize Slim App
$app = new \Slim\App();

require '../config/guzzle.php';

// add injection dependencies
$container = $app->getContainer();
$container['GuzzleClient'] = function ($container) {
    return new \GuzzleHttp\Client($config);
};
$container['TwitterService'] = function ($container) {
    return new \TwitterApp\Service\Twitter\TwitterServiceImpl($container->get('GuzzleClient'));
};
$container['TwitterRepository'] = function ($container) {
    return new \TwitterApp\Repository\TwitterRepositoryImpl($container->get('TwitterService'));
};
$container['TwitterController'] = function ($container) {
    return new \TwitterApp\Controllers\TwitterController($container, $container->get('TwitterRepository'));
};

// include routes
require '../routes/api.php';

$app->run();