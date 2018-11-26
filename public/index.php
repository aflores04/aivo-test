<?php

require '../vendor/autoload.php';

/**
 * Set configurations
 */
require '../config/app.php';
require '../config/twitter.php';

// initialize Slim App
$app = new \Slim\App($config);

// add injection dependencies
$container = $app->getContainer();
$container['TwitterClient'] = function () use ($twitter) {
    return new \Abraham\TwitterOAuth\TwitterOAuth($twitter['api_key'], $twitter['secret'], $twitter['access_token'], $twitter['access_token_secret']);
};
$container['TwitterService'] = function ($container) {
    return new \TwitterApp\Service\Twitter\TwitterServiceImpl($container->get('TwitterClient'));
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