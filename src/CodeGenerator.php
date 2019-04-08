#!/bin/php

<?php
foreach (array(
             __DIR__ . '/../../../autoload.php',
             __DIR__ . '/../../autoload.php',
             __DIR__ . '/../vendor/autoload.php',
             __DIR__ . '/vendor/autoload.php',
         ) as $file) {
    if (file_exists($file)) {
        define('CODE_GENERATOR_COMPOSER_INSTALL', $file);

        break;
    }
}

unset($file);

if (!defined('CODE_GENERATOR_COMPOSER_INSTALL')) {
    fwrite(
        STDERR,
        'You need to set up the project dependencies using Composer:' . PHP_EOL . PHP_EOL .
        '    composer install' . PHP_EOL . PHP_EOL .
        'You can learn all about Composer on https://getcomposer.org/.' . PHP_EOL
    );

    return -1;
}

require CODE_GENERATOR_COMPOSER_INSTALL;

$application = new \Symfony\Component\Console\Application();
$application->add(new \OpenClassrooms\CodeGenerator\Commands\ViewModelsCommand());
$application->add(new \OpenClassrooms\CodeGenerator\Commands\GenericUseCaseCommand());
$application->run();
