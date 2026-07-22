<?php
declare(strict_types=1);

// PricingDay SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class PricingDayMakeContext
{
    public static function call(array $ctxmap, ?PricingDayContext $basectx): PricingDayContext
    {
        return new PricingDayContext($ctxmap, $basectx);
    }
}
