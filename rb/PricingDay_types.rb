# frozen_string_literal: true

# Typed models for the PricingDay SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# Catalog entity data model.
#
# @!attribute [rw] n_ssg
#   @return [Boolean, nil]
#
# @!attribute [rw] page_prop
#   @return [Hash, nil]
Catalog = Struct.new(
  :n_ssg,
  :page_prop,
  keyword_init: true
)

# Request payload for Catalog#load.
#
# @!attribute [rw] n_ssg
#   @return [Boolean, nil]
#
# @!attribute [rw] page_prop
#   @return [Hash, nil]
CatalogLoadMatch = Struct.new(
  :n_ssg,
  :page_prop,
  keyword_init: true
)

