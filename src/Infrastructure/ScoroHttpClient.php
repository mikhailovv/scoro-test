<?php

declare(strict_types=1);

namespace Scoro\Infrastructure;

use Scoro\DTO\Company;

class ScoroHttpClient
{
    private array $categories;
    public function __construct(private string $baseURL, private string $apiKey, private string $companyAccountId)
    {}

    public function findCompanyByName(string $name): ?Company
    {
        $result = $this->executeQuery('/contacts', ["filter" => ["name" => $name . "%"]]);

        if (isset($result['status']) && $result['status'] === 'OK' && isset($result['data'])){
            $data = current($result['data']);
            if ($data){
                return new Company($data['name'], (string)$data['contact_id'], $this->getCategoryNameById((int)$data['cat_id']), $data['timezone']);
            }
        };

        return null;
    }

    public function getCategoryNameById(int $categoryId): string
    {
        if (empty($this->categories)){
            $this->initCategories();
        }

        return $this->categories[$categoryId] ?? '';
    }

    public function initCategories(): void
    {
        $result = $this->executeQuery('/categories');
        if (isset($result['status']) && $result['status'] === 'OK' && isset($result['data'])){
            foreach ($result['data'] as $row){
                if (isset($row['cat_id'], $row['cat_name'])){
                    $categoryName = explode(' - ', $row['cat_name'])[1];
                    $this->categories[(int)$row['cat_id']] = $categoryName;
                }
            }
        }
    }

    private function executeQuery(string $url, array $requestData = []): array
    {
        $fields = array_merge(
            [
                'apiKey' => $this->apiKey,
                'lang' => 'eng',
                'company_account_id' => $this->companyAccountId,
                'per_page' => '10',
            ],
            $requestData
        );
        $fieldsJson = json_encode($fields);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseURL.$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsJson);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result) {
            return json_decode($result, true);
        }

        return [];
    }
}
