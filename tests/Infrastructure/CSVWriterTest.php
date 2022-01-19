<?php

declare(strict_types=1);

namespace Scoro\Tests\Infrastructure;

use PHPUnit\Framework\TestCase;
use Scoro\DTO\Company;
use Scoro\DTO\CompanyCheckResult;
use Scoro\Enum\CheckResult;
use Scoro\Infrastructure\CSVWriter;

class CSVWriterTest extends TestCase
{
    private const FILENAME = './test.csv';

    public function testWrite(): void
    {
        $csvWriter = new CSVWriter(self::FILENAME);
        $inputData = [
            ['name' => 'company1', 'result' => CheckResult::CORRECT->value],
            ['name' => 'company2', 'result' => CheckResult::NOT_CORRECT->value],
        ];

        foreach ($inputData as $data) {
            $checkResult = $this->generateCheckResult($data);
            $csvWriter->addRow($checkResult);
        }

        self::assertFileExists(self::FILENAME);
    }

    public function tearDown(): void
    {
        if (file_exists(self::FILENAME)) {
            @unlink(self::FILENAME);
        }
        parent::tearDown();
    }

    private function generateCheckResult(array $data): CompanyCheckResult
    {
        return new CompanyCheckResult(
            new Company($data['name'], (string)rand(10000, 2000), 'test', 'test'),
            CheckResult::from($data['result'])
        );
    }

}
