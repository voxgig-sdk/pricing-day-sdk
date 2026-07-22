# PricingDay SDK utility: make_context
require_relative '../core/context'
module PricingDayUtilities
  MakeContext = ->(ctxmap, basectx) {
    PricingDayContext.new(ctxmap, basectx)
  }
end
