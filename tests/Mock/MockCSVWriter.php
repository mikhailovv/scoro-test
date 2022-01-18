<?php

declare(strict_types=1);

namespace Scoro\Tests\Mock;

use Scoro\DTO\CompanyCheckResult;
use Scoro\Infrastructure\Writer;

class MockCSVWriter implements Writer
{
    public array $results = [];
    public function addRow(CompanyCheckResult $companyCheckResult): void
    {
        $this->results[] = ['name' => $companyCheckResult->getCompany()->getName(), 'result' => $companyCheckResult->getResult()->value];
    }

}
