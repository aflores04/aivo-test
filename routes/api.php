<?php

$app->get('/user/{id}/tweets[/{limit}]', 'TwitterController:index');