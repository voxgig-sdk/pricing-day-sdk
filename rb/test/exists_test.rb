# PricingDay SDK exists test

require "minitest/autorun"
require_relative "../PricingDay_sdk"

class ExistsTest < Minitest::Test
  def test_create_test_sdk
    testsdk = PricingDaySDK.test(nil, nil)
    assert !testsdk.nil?
  end
end
