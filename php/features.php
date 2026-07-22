<?php
declare(strict_types=1);

// PricingDay SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class PricingDayFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new PricingDayBaseFeature();
            case "test":
                return new PricingDayTestFeature();
            default:
                return new PricingDayBaseFeature();
        }
    }
}
