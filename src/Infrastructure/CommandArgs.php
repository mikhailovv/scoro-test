<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\Arguments;
use Scoro\Exception\ArgumentException;

class CommandArgs
{
    public static function generateArguments(array $options): Arguments
    {
        if (empty($options['i']) || empty($options['o'])) {
            throw new ArgumentException(
                'Missing parameters, for use -i for determinate path to the input file and -o for determinate output file.'.PHP_EOL
                .'For example: php index.php -i source.xml -o destination.csv'.PHP_EOL
            );
        }
        if (!file_exists($options['i'])) {
            throw new ArgumentException(sprintf('The file %s not found, please check path', $options['i']));
        }

        if (!touch($options['o'])) {
            throw new ArgumentException(sprintf('Can\'t right for create output file %s', $options['o']));
        }

        return new Arguments(realpath($options['i']), $options['o']);
    }
}
