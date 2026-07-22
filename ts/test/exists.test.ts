
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { PricingDaySDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await PricingDaySDK.test()
    equal(null !== testsdk, true)
  })

})
