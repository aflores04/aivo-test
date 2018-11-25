<?php

require '../vendor/autoload.php';

// initialize Slim App
$app = new \Slim\App([
    'displayErrorDetails' => true
]);

$container = $app->getContainer();

$container['TwitterController'] = function ($container) {
    return new \TwitterApp\Controllers\TwitterController($container);
};

// include routes
require '../routes/api.php';

$app->run();