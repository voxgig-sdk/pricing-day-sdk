# PricingDay SDK configuration


def make_config():
    return {
        "main": {
            "name": "PricingDay",
        },
        "feature": {
            "test": {
        "options": {
          "active": False,
        },
      },
        },
        "options": {
            "base": "https://pricing.day",
            "headers": {
        "content-type": "application/json",
      },
            "entity": {
                "catalog": {},
            },
        },
        "entity": {
      "catalog": {
        "fields": [],
        "name": "catalog",
        "op": {
          "load": {
            "input": "data",
            "name": "load",
            "points": [
              {
                "active": True,
                "args": {},
                "kind": "http",
                "method": "GET",
                "orig": "/_next/data/ltZLXFvzTh1RillBuqeGx/index.json",
                "parts": [
                  "_next",
                  "data",
                  "ltZLXFvzTh1RillBuqeGx",
                  "index.json",
                ],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body.pageProps`",
                },
                "index$": 0,
              },
            ],
            "key$": "load",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
