# PricingDay SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'graphql'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

PricingDayUtility.registrar = ->(u) {
  u.clean = PricingDayUtilities::Clean
  u.done = PricingDayUtilities::Done
  u.make_error = PricingDayUtilities::MakeError
  u.feature_add = PricingDayUtilities::FeatureAdd
  u.feature_hook = PricingDayUtilities::FeatureHook
  u.feature_init = PricingDayUtilities::FeatureInit
  u.fetcher = PricingDayUtilities::Fetcher
  u.make_fetch_def = PricingDayUtilities::MakeFetchDef
  u.make_context = PricingDayUtilities::MakeContext
  u.make_options = PricingDayUtilities::MakeOptions
  u.make_request = PricingDayUtilities::MakeRequest
  u.make_response = PricingDayUtilities::MakeResponse
  u.make_result = PricingDayUtilities::MakeResult
  u.make_point = PricingDayUtilities::MakePoint
  u.make_spec = PricingDayUtilities::MakeSpec
  u.make_url = PricingDayUtilities::MakeUrl
  u.param = PricingDayUtilities::Param
  u.prepare_auth = PricingDayUtilities::PrepareAuth
  u.prepare_body = PricingDayUtilities::PrepareBody
  u.prepare_headers = PricingDayUtilities::PrepareHeaders
  u.prepare_method = PricingDayUtilities::PrepareMethod
  u.prepare_params = PricingDayUtilities::PrepareParams
  u.prepare_path = PricingDayUtilities::PreparePath
  u.prepare_query = PricingDayUtilities::PrepareQuery
  u.graphql_body = PricingDayUtilities::GraphqlBody
  u.graphql_errors = PricingDayUtilities::GraphqlErrors
  u.result_basic = PricingDayUtilities::ResultBasic
  u.result_body = PricingDayUtilities::ResultBody
  u.result_headers = PricingDayUtilities::ResultHeaders
  u.transform_request = PricingDayUtilities::TransformRequest
  u.transform_response = PricingDayUtilities::TransformResponse
}
