<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\CompanyCheckResult;

class CSVWriter implements Writer
{
    private $fp;

    public function __construct(string $filename)
    {
        $this->fp = fopen($filename, 'w');
    }

    public function addRow(CompanyCheckResult $companyCheckResult): void
    {
        fputcsv($this->fp, [
            'name' => $companyCheckResult->getCompany()->getName(),
            'idCode' => $companyCheckResult->getCompany()->getIdCode(),
            'clientCategory' => $companyCheckResult->getCompany()->getClientCategory(),
            'country' => $companyCheckResult->getCompany()->getCountry(),
            'result' => $companyCheckResult->getResult()->value
        ]);
    }

    public function __destruct()
    {
        fclose($this->fp);
    }

}
