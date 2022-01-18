<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

interface Reader
{
    public function getRow(): string;
}
