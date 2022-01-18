<?php

declare(strict_types=1);

namespace Scoro\DTO;

use Scoro\Enum\CheckResult;

class CompanyCheckResult
{
    public function __construct(private Company $company, private CheckResult $result)
    {
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }

    public function getResult(): CheckResult
    {
        return $this->result;
    }

    public function setResult(CheckResult $result): void
    {
        $this->result = $result;
    }
}
