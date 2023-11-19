<?php

require '../Include/Config.php';
require '../Include/Functions.php';

require_once __DIR__ . '/../vendor/autoload.php';

use ChurchCRM\Slim\Middleware\AuthMiddleware;
use ChurchCRM\Slim\Middleware\VersionMiddleware;
use Slim\Factory\AppFactory;
use Slim\HttpCache\CacheProvider;

$app = AppFactory::create();
$container = $app->getContainer();
$app->setBasePath('/v2');

$app->add(new VersionMiddleware());
$app->add(new AuthMiddleware());

// Set up
require __DIR__ . '/../Include/slim/error-handler.php';

require __DIR__ . '/routes/common/mvc-helper.php';

// admin routes
require __DIR__ . '/routes/admin/admin.php';
require __DIR__ . '/routes/user.php';


require __DIR__ . '/routes/people.php';
require __DIR__ . '/routes/family.php';
require __DIR__ . '/routes/person.php';

require __DIR__ . '/routes/email.php';
require __DIR__ . '/routes/calendar.php';
require __DIR__ . '/routes/cart.php';

require __DIR__ . '/routes/user-current.php';

require __DIR__ . '/routes/root.php';

// Run app
$app->run();
