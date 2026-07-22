<?php
declare(strict_types=1);

// PricingDay SDK utility: result_body

class PricingDayResultBody
{
    public static function call(PricingDayContext $ctx): ?PricingDayResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
