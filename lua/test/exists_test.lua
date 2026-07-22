-- PricingDay SDK exists test

local sdk = require("pricing-day_sdk")

describe("PricingDaySDK", function()
  it("should create test SDK", function()
    local testsdk = sdk.test(nil, nil)
    assert.is_not_nil(testsdk)
  end)
end)
