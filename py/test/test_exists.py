# PricingDay SDK exists test

import pytest
from pricingday_sdk import PricingDaySDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = PricingDaySDK.test(None, None)
        assert testsdk is not None
