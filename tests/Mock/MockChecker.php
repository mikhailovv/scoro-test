<?php

declare(strict_types=1);

namespace Scoro\Tests\Mock;

use Scoro\DTO\Company;
use Scoro\DTO\CompanyCheckResult;
use Scoro\Enum\CheckResult;
use Scoro\Infrastructure\Checker;

class MockChecker implements Checker
{
    public function check(Company $company): CompanyCheckResult
    {
        return new CompanyCheckResult($company, rand(0, 1) == 1 ? CheckResult::CORRECT : CheckResult::NOT_CORRECT);
    }
}
