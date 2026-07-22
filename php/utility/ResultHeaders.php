<?php
declare(strict_types=1);

// PricingDay SDK utility: result_headers

class PricingDayResultHeaders
{
    public static function call(PricingDayContext $ctx): ?PricingDayResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
