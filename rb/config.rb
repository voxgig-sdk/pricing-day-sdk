# PricingDay SDK configuration

module PricingDayConfig
  def self.make_config
    {
      "main" => {
        "name" => "PricingDay",
      },
      "feature" => {
        "test" => {
          "options" => {
            "active" => false,
          },
        },
      },
      "options" => {
        "base" => "https://pricing.day",
        "headers" => {
          "content-type" => "application/json",
        },
        "entity" => {
          "catalog" => {},
        },
      },
      "entity" => {
        "catalog" => {
          "fields" => [],
          "name" => "catalog",
          "op" => {
            "load" => {
              "input" => "data",
              "name" => "load",
              "points" => [
                {
                  "active" => true,
                  "args" => {},
                  "kind" => "http",
                  "method" => "GET",
                  "orig" => "/_next/data/ltZLXFvzTh1RillBuqeGx/index.json",
                  "parts" => [
                    "_next",
                    "data",
                    "ltZLXFvzTh1RillBuqeGx",
                    "index.json",
                  ],
                  "select" => {},
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body.pageProps`",
                  },
                  "index$" => 0,
                },
              ],
              "key$" => "load",
            },
          },
          "relations" => {
            "ancestors" => [],
          },
        },
      },
    }
  end


  def self.make_feature(name)
    require_relative 'features'
    PricingDayFeatures.make_feature(name)
  end
end
