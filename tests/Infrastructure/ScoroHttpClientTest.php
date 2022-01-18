<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use PHPUnit\Framework\TestCase;
use Scoro\DTO\Company;
use Scoro\Enum\CheckResult;

class ScoroHttpClientTest extends TestCase
{
    public function testExecuteQuery(): void
    {

        $configuration = new Configuration(dirname(__FILE__) .'/../../.env');
        $checker = new ScoroChecker(
            new ScoroHttpClient(
                $configuration->getBaseUrl(),
                $configuration->getApiKey(),
                $configuration->getCompanyAccountId()
            )
        );

        $company = new Company("Airtight Holdings", '12', 'Standard client', 'test');
        $checkResult = $checker->check($company);

        self::assertEquals(CheckResult::CORRECT, $checkResult->getResult());

        $company = new Company("Airtight Holdings", '12', 'VIP client', 'test');
        $checkResult = $checker->check($company);

        self::assertEquals(CheckResult::NOT_CORRECT, $checkResult->getResult());
    }
}
