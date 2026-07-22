# PricingDay SDK feature factory

from feature.base_feature import PricingDayBaseFeature
from feature.test_feature import PricingDayTestFeature


def _make_feature(name):
    features = {
        "base": lambda: PricingDayBaseFeature(),
        "test": lambda: PricingDayTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
