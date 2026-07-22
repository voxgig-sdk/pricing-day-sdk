-- PricingDay SDK error

local PricingDayError = {}
PricingDayError.__index = PricingDayError


function PricingDayError.new(code, msg, ctx)
  local self = setmetatable({}, PricingDayError)
  self.is_sdk_error = true
  self.sdk = "PricingDay"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function PricingDayError:error()
  return self.msg
end


function PricingDayError:__tostring()
  return self.msg
end


return PricingDayError
