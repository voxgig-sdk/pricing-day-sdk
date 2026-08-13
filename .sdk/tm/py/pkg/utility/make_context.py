# PricingDay SDK utility: make_context

from projectname_sdk.core.context import PricingDayContext


def make_context_util(ctxmap, basectx):
    return PricingDayContext(ctxmap, basectx)
