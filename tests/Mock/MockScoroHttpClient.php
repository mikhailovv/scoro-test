<?php

declare(strict_types=1);

namespace Scoro\Tests\Mock;

use Scoro\DTO\Company;
use Scoro\Infrastructure\ScoroHttpClient;

class MockScoroHttpClient extends ScoroHttpClient
{
    public function findCompanyByName(string $name): ?Company
    {
        return new Company('Airtight Holdings', '12', 'Standard client', 'test');
    }
}
