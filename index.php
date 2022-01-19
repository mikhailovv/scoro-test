<?php

declare(strict_types=1);

use Scoro\Application\Application;
use Scoro\Infrastructure\CommandArgs;
use Scoro\Infrastructure\Configuration;
use Scoro\Infrastructure\CSVWriter;
use Scoro\Infrastructure\ScoroChecker;
use Scoro\Infrastructure\ScoroHttpClient;
use Scoro\Infrastructure\XmlReader;

require 'vendor/autoload.php';


set_exception_handler(function ($e){
    echo 'Application got exception: ' . $e->getMessage();
});
set_error_handler(function ($severity, $message, $filename, $lineno){
    echo 'Application got error: ' . $message;
});


$configuration = new Configuration(__DIR__.'/.env');

$arguments = CommandArgs::generateArguments(getopt("i:o:"));

$app = new Application(
    new XmlReader($arguments->getInputFile()),
    new CSVWriter($arguments->getOutputFile()),
    new ScoroChecker(
        new ScoroHttpClient(
            $configuration->getBaseUrl(),
            $configuration->getApiKey(),
            $configuration->getCompanyAccountId()
        )
    )
);

$app->run();


