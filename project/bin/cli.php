<?php

try {
    unset($argv[0]);

    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/../src/' . $className . '.php';
    });

    if (empty($argv)) {
        throw new \MyProject\Exceptions\CliException('Please, add command.');
    }

    $className = '\\MyProject\\Cli\\' . array_shift($argv);
    if (!class_exists($className)) {
        throw new \MyProject\Exceptions\CliException('Command class "' . $className . '" not found');
    }

    if (!is_subclass_of($className, \MyProject\Cli\AbstractCommand::class)) {
        throw new \MyProject\Exceptions\CliException(
            'Command class "' . $className . '" must be a subclass of \MyProject\Cli\AbstractCommand.'
        );
    }

    $params = $argv;
    $classInstance = new $className($params);
    $classInstance->execute();
} catch (\MyProject\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
} catch (\Throwable $e) {
    echo 'Unexpected error: ' . $e->getMessage() . PHP_EOL;
}