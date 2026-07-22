<?php
declare(strict_types=1);

// PricingDay SDK utility: prepare_body

class PricingDayPrepareBody
{
    public static function call(PricingDayContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
