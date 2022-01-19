


Install application
```
git clone git@github.com:mikhailovv/scoro-test.git scoro
cd scoro
composer install
```

Copy .env.dev to .env and fill fields
```
SCORO_BASE_URL=base_url
SCORO_API_KEY=api_key
SCORO_COMPANY_ACCOUNT_ID=account_id
```

Run tests:
```
vendor/bin/phpunit tests
```

Use application

``
php index.php -i {path to source.xml} -o {path to destination.csv} 
``


For example:
```
php index.php -i tests/data/input.xml -o result.csv
```
