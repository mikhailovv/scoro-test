<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\Exception\ConfigurationException;

class Configuration
{
    private string $baseUrl;
    private string $apiKey;
    private string $companyAccountId;

    public function __construct(string $filename)
    {
        $config = parse_ini_file($filename);

        $this->baseUrl = $config['SCORO_BASE_URL']
            ?? throw new ConfigurationException('Fill SCORO_BASE_URL in .env');

        $this->apiKey = $config['SCORO_API_KEY']
            ?? throw new ConfigurationException('Fill SCORO_API_KEY in .env');

        $this->companyAccountId = $config['SCORO_COMPANY_ACCOUNT_ID']
            ?? throw new ConfigurationException('Fill COMPANY_ACCOUNT_ID in .env');
    }

    public function getBaseUrl(): mixed
    {
        return $this->baseUrl;
    }

    public function getApiKey(): mixed
    {
        return $this->apiKey;
    }

    public function getCompanyAccountId(): mixed
    {
        return $this->companyAccountId;
    }
}
