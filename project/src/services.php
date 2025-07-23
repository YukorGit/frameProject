<?php
use MyProject\Services\Db;
use MyProject\Services\EmailSender;
use MyProject\View\View;
use MyProject\Services\DI\Container;

$container = new Container();

$container->set('db', function (Container $c) {
    $settings = require __DIR__ . '/settings.php';
    return new Db($settings['db']);
});

$container->set('view', function (Container $c) {
    return new View(__DIR__ . '/../templates');
});

$container->set('email_sender', function(Container $c) {
    return new EmailSender();
});

$container->set('users_service', function(Container $c) {
    return new \MyProject\Services\UserActivationService(
        $c->get('db'),
    );
});

return $container;