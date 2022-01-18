<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\Company;
use Scoro\DTO\CompanyCheckResult;
use Scoro\Enum\CheckResult;

class ScoroChecker implements Checker
{
    public function __construct(private ScoroHttpClient $scoroHttpClient)
    {
    }

    public function check(Company $company): CompanyCheckResult
    {
        $findedCompany = $this->scoroHttpClient->findCompanyByName($company->getName());
        if (!$findedCompany) {
            return new CompanyCheckResult($company, CheckResult::NOT_CORRECT);
        }

        if ($findedCompany->getName() === $company->getName()
            && $findedCompany->getClientCategory() === $company->getClientCategory()) {
            return new CompanyCheckResult($company, CheckResult::CORRECT);
        }

        return new CompanyCheckResult($company, CheckResult::NOT_CORRECT);
    }

}
