
import { Context } from './Context'


class PricingDayError extends Error {

  isPricingDayError = true

  sdk = 'PricingDay'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  PricingDayError
}

