<?php

declare(strict_types=1);

namespace Scoro\Tests\Infrastructure;

use PHPUnit\Framework\TestCase;
use Scoro\Infrastructure\XmlReader;

class XmlReaderTest extends TestCase
{
    private const FILENAME = 'input.xml';

    public function testGetRow()
    {
        $filename = dirname(__FILE__) .'/../data/'.self::FILENAME;
        $xmlReader = new XmlReader($filename);

        $row = $xmlReader->getRow();
        $expectedRow = '<contact>
        <name>Airtight Holdings</name>
        <idCode>123456</idCode>
        <clientCategory>Standard client</clientCategory>
        <country>Estonia</country>
    </contact>';

        self::assertEquals($expectedRow, $row);

        $row = $xmlReader->getRow();
        $expectedRow = '<contact>
        <name>Fineline Inc.</name>
        <idCode>223456</idCode>
        <clientCategory>Standard client</clientCategory>
        <country>Germany</country>
    </contact>';
        self::assertEquals($expectedRow, $row);


        while (true){
            $row = $xmlReader->getRow();
            if ($row === ''){
                break;
            }
        }

        self::assertEquals('', $row);
    }


}
