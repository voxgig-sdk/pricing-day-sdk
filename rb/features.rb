# PricingDay SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/ratelimit_feature'
require_relative 'feature/retry_feature'
require_relative 'feature/test_feature'
require_relative 'feature/timeout_feature'


module PricingDayFeatures
  def self.make_feature(name)
    case name
    when "base"
      PricingDayBaseFeature.new
    when "ratelimit"
      PricingDayRatelimitFeature.new
    when "retry"
      PricingDayRetryFeature.new
    when "test"
      PricingDayTestFeature.new
    when "timeout"
      PricingDayTimeoutFeature.new
    else
      PricingDayBaseFeature.new
    end
  end
end
