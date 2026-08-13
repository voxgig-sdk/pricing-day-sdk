<?php
declare(strict_types=1);

// PricingDay SDK configuration

class PricingDayConfig
{
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "PricingDay",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://pricing.day",
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "catalog" => [],
                ],
            ],
            "entity" => [
        'catalog' => [
          'fields' => [],
          'name' => 'catalog',
          'op' => [
            'load' => [
              'input' => 'data',
              'name' => 'load',
              'points' => [
                [
                  'active' => true,
                  'args' => [],
                  'kind' => 'http',
                  'method' => 'GET',
                  'orig' => '/_next/data/ltZLXFvzTh1RillBuqeGx/index.json',
                  'parts' => [
                    '_next',
                    'data',
                    'ltZLXFvzTh1RillBuqeGx',
                    'index.json',
                  ],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body.pageProps`',
                  ],
                  'index$' => 0,
                ],
              ],
              'key$' => 'load',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return PricingDayFeatures::make_feature($name);
    }
}
