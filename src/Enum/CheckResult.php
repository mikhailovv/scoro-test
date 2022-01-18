<?php

declare(strict_types=1);

namespace Scoro\Enum;

enum CheckResult: string
{
    case CORRECT = 'correct';
    case NOT_CORRECT = 'not correct';
}
