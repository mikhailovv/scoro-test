<?php

declare(strict_types=1);

namespace Scoro\DTO;

class Company
{
    public function __construct(
        private string $name,
        private string $idCode,
        private string $clientCategory,
        private string $country
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIdCode(): string
    {
        return $this->idCode;
    }

    public function getClientCategory(): string
    {
        return $this->clientCategory;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

}
