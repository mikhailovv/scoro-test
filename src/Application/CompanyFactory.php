<?php

declare(strict_types=1);

namespace Scoro\Application;

use Scoro\DTO\Company;

class CompanyFactory
{
    public static function createFromXml(string $xml): Company
    {
        $data = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);

        return new Company((string)$data->name, (string)$data->idCode, (string)$data->clientCategory, (string)$data->country);
    }
}
