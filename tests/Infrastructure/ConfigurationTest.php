<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfiguration(): void
    {
        $configuration = new Configuration(dirname(__FILE__) .'/../data/.env');
        self::assertEquals('api_key', $configuration->getApiKey());
        self::assertEquals('base_url', $configuration->getBaseUrl());
        self::assertEquals('account_id', $configuration->getCompanyAccountId());
    }

}
