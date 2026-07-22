-- PricingDay SDK configuration

local function make_config()
  return {
    main = {
      name = "PricingDay",
    },
    feature = {
      ["test"] = {
        ["options"] = {
          ["active"] = false,
        },
      },
    },
    options = {
      base = "https://pricing.day",
      headers = {
        ["content-type"] = "application/json",
      },
      entity = {
        ["catalog"] = {},
      },
    },
    entity = {
      ["catalog"] = {
        ["fields"] = {
          {
            ["active"] = true,
            ["name"] = "n_ssg",
            ["req"] = false,
            ["type"] = "`$BOOLEAN`",
            ["index$"] = 0,
          },
          {
            ["active"] = true,
            ["name"] = "page_prop",
            ["req"] = false,
            ["type"] = "`$OBJECT`",
            ["index$"] = 1,
          },
        },
        ["name"] = "catalog",
        ["op"] = {
          ["load"] = {
            ["input"] = "data",
            ["name"] = "load",
            ["points"] = {
              {
                ["active"] = true,
                ["args"] = {},
                ["method"] = "GET",
                ["orig"] = "/_next/data/ltZLXFvzTh1RillBuqeGx/index.json",
                ["parts"] = {
                  "_next",
                  "data",
                  "ltZLXFvzTh1RillBuqeGx",
                  "index.json",
                },
                ["select"] = {},
                ["transform"] = {
                  ["req"] = "`reqdata`",
                  ["res"] = "`body`",
                },
                ["index$"] = 0,
              },
            },
            ["key$"] = "load",
          },
        },
        ["relations"] = {
          ["ancestors"] = {},
        },
      },
    },
  }
end


local function make_feature(name)
  local features = require("features")
  local factory = features[name]
  if factory ~= nil then
    return factory()
  end
  return features.base()
end


-- Attach make_feature to the SDK class
local function setup_sdk(SDK)
  SDK._make_feature = make_feature
end


return make_config
