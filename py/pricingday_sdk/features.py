# PricingDay SDK feature factory

from pricingday_sdk.feature.base_feature import PricingDayBaseFeature
from pricingday_sdk.feature.ratelimit_feature import PricingDayRatelimitFeature
from pricingday_sdk.feature.retry_feature import PricingDayRetryFeature
from pricingday_sdk.feature.test_feature import PricingDayTestFeature
from pricingday_sdk.feature.timeout_feature import PricingDayTimeoutFeature


_FEATURES = {
    "base": lambda: PricingDayBaseFeature(),
    "ratelimit": lambda: PricingDayRatelimitFeature(),
    "retry": lambda: PricingDayRetryFeature(),
    "test": lambda: PricingDayTestFeature(),
    "timeout": lambda: PricingDayTimeoutFeature(),
}


def _make_feature(name):
    factory = _FEATURES.get(name)
    if factory is not None:
        return factory()
    return _FEATURES["base"]()


# True when this SDK was generated with the named feature class - the
# constructor's tolerance for extend-carried features reads this (an
# active name with no generated class must not become a BaseFeature
# stray when an extend instance carries it).
def _has_feature(name):
    return name in _FEATURES
