package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewCatalogEntityFunc func(client *PricingDaySDK, entopts map[string]any) PricingDayEntity

