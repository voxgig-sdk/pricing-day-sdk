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
          'fields' => [
            [
              'active' => true,
              'name' => 'n_ssg',
              'req' => false,
              'type' => '`$BOOLEAN`',
              'index$' => 0,
            ],
            [
              'active' => true,
              'name' => 'page_prop',
              'req' => false,
              'type' => '`$OBJECT`',
              'index$' => 1,
            ],
          ],
          'name' => 'catalog',
          'op' => [
            'load' => [
              'input' => 'data',
              'name' => 'load',
              'points' => [
                [
                  'active' => true,
                  'args' => [],
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
                    'res' => '`body`',
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
