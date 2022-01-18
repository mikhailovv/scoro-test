<?php

declare(strict_types=1);

namespace Scoro\Tests\Application;

use PHPUnit\Framework\TestCase;
use Scoro\Application\Application;
use Scoro\Tests\Mock\MockChecker;
use Scoro\Tests\Mock\MockCSVWriter;
use Scoro\Tests\Mock\MockXmlReader;


class AppTest  extends TestCase
{
    public function testReader(): void {
        $mockWriter = new MockCSVWriter();

        $app = new Application(new MockXmlReader(), $mockWriter, new MockChecker());
        $app->run();

        $this->assertTrue(count($mockWriter->results) > 0);
    }
}
