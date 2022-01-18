<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\Company;
use Scoro\DTO\CompanyCheckResult;

interface Checker
{
    public function check(Company $company): CompanyCheckResult;
}
