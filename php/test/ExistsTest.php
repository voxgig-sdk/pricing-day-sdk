<?php
declare(strict_types=1);

// PricingDay SDK exists test

require_once __DIR__ . '/../pricingday_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = PricingDaySDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}
