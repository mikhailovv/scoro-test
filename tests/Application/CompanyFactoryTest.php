<?php

declare(strict_types=1);

namespace Scoro\Tests\Application;

use PHPUnit\Framework\TestCase;
use Scoro\Application\CompanyFactory;
use Scoro\Tests\Mock\MockXmlReader;

class CompanyFactoryTest extends TestCase
{
    public function testCreateFromXml()
    {
        $mockXmlReader = new MockXmlReader();
        $xml = $mockXmlReader->getRow();

        $company = CompanyFactory::createFromXml($xml);

        self::assertEquals(MockXmlReader::FIRST_COMPANY_ID_CODE, $company->getIdCode());
        self::assertEquals(MockXmlReader::FIRST_COMPANY_NAME, $company->getName());

    }
}
