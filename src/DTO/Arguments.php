<?php

declare(strict_types=1);

namespace Scoro\DTO;

class Arguments
{
    public function __construct(
        private string $inputFile,
        private string $outputFile
    ) {
    }

    public function getInputFile(): string
    {
        return $this->inputFile;
    }

    public function getOutputFile(): string
    {
        return $this->outputFile;
    }


}
