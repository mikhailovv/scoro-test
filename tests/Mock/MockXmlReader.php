<?php

declare(strict_types=1);

namespace Scoro\Tests\Mock;

use Scoro\Infrastructure\Reader;

class MockXmlReader implements Reader
{
    public const FIRST_COMPANY_NAME = 'Airtight Holdings';
    public const FIRST_COMPANY_ID_CODE = '123456';

    private int $counter = 0;
    private array $rows = [
        '<contact>
<name>'.self::FIRST_COMPANY_NAME.'</name>
<idCode>'.self::FIRST_COMPANY_ID_CODE.'</idCode>
<clientCategory>Standard client</clientCategory>
<country>Estonia</country>
</contact>',
        '<contact>
<name>Fineline Inc.</name>
<idCode>223456</idCode>
<clientCategory>Standard client</clientCategory>
<country>Germany</country>
</contact>',
        '<contact>
<name>Optimist Group</name>
<idCode>342256</idCode>
<clientCategory>VIP client</clientCategory>
<country>United States of America</country>
</contact>',
        '<contact>
<name>Red House Realtors Ltd.</name>
<idCode>655756</idCode>
<clientCategory>Meh client</clientCategory>
</contact>',
        '<contact>
<name>Playtime LLC</name>
<idCode>3422776</idCode>
<clientCategory>VIP client</clientCategory>
</contact>',
    ];

    public function getRow(): string
    {
        if (count($this->rows) == $this->counter) {
            return '';
        }

        return $this->rows[$this->counter++];
    }

}
