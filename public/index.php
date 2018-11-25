<?php

require '../vendor/autoload.php';

// initialize Slim App
$app = new \Slim\App([
    'displayErrorDetails' => true
]);

require '../config/guzzle.php';

// add injection dependencies
$container = $app->getContainer();
$container['GuzzleClient'] = function ($container) {
    return new \GuzzleHttp\Client();
};
$container['TwitterService'] = function ($container) {
    return new \TwitterApp\Service\Twitter\TwitterServiceImpl($container->get('GuzzleClient'));
};
$container['TwitterController'] = function ($container) {
    return new \TwitterApp\Controllers\TwitterController($container);
};

// include routes
require '../routes/api.php';

$app->run();