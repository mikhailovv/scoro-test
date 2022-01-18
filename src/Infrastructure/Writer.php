<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\CompanyCheckResult;

interface Writer
{
    public function addRow(CompanyCheckResult $companyCheckResult): void;
}
