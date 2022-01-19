<?php

declare(strict_types=1);

namespace Scoro\Application;

use Scoro\Infrastructure\Checker;
use Scoro\Infrastructure\Reader;
use Scoro\Infrastructure\Writer;

class Application
{
    public function __construct(private Reader $reader, private Writer $writer, private Checker $checker)
    {
    }

    public function run(): void
    {
        while (true) {
            $xmlRow = $this->reader->getRow();
            if ($xmlRow === '') {
                break;
            }

            $company = CompanyFactory::createFromXml($xmlRow);
            $checkResult = $this->checker->check($company);
            $this->writer->addRow($checkResult);

            echo '#';
        }
        echo PHP_EOL.'done'.PHP_EOL;
    }
}
