<?php

use Core\App;
use Core\Database;
use Core\Container;

App::setContainer(new Container);

App::bind('Core\Database', function() {
    $config = require base_path('config.php');

    return new Database($config['database']);
});