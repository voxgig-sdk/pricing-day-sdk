# PricingDay SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module PricingDayFeatures
  def self.make_feature(name)
    case name
    when "base"
      PricingDayBaseFeature.new
    when "test"
      PricingDayTestFeature.new
    else
      PricingDayBaseFeature.new
    end
  end
end
