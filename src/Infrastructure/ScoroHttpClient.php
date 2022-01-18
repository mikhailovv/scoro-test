<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

class ScoroHttpClient
{
    public function __construct(private string $baseURL, private string $apiKey, private string $companyAccountId)
    {
    }

    public function executeQuery(string $url='/contacts')
    {

        $fields = array(
            'apiKey' => $this->apiKey,
            'lang' => 'eng',
            'company_account_id' => $this->companyAccountId,
            'per_page' => '10',
        );
        $fieldsJson = json_encode($fields);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseURL.$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsJson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result) {
            $contacts = json_decode($result, true);
            print_r($contacts);
        }
    }
}
