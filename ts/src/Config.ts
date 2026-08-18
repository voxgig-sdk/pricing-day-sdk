
import { BaseFeature } from './feature/base/BaseFeature'
import { TestFeature } from './feature/test/TestFeature'



const FEATURE_CLASS: Record<string, typeof BaseFeature> = {
   test: TestFeature,

}


class Config {

  makeFeature(this: any, fn: string) {
    const fc = FEATURE_CLASS[fn]
    const fi = new fc()
    // TODO: errors etc
    return fi
  }


  main = {
    name: 'PricingDay',
  }


  feature = {
     test:     {
      "options": {
        "active": false
      }
    },

  }


  options = {
    base: "https://pricing.day",

    headers: {
      "content-type": "application/json"
    },

    entity: {
      
      catalog: {
      },

    }
  }


  entity = {
    "catalog": {
      "fields": [],
      "name": "catalog",
      "op": {
        "load": {
          "input": "data",
          "name": "load",
          "points": [
            {
              "args": {},
              "kind": "http",
              "method": "GET",
              "orig": "/_next/data/ltZLXFvzTh1RillBuqeGx/index.json",
              "parts": [
                "_next",
                "data",
                "ltZLXFvzTh1RillBuqeGx",
                "index.json"
              ],
              "select": {},
              "transform": {
                "req": "`reqdata`",
                "res": "`body.pageProps`"
              }
            }
          ]
        }
      },
      "relations": {
        "ancestors": []
      }
    }
  }
}


const config = new Config()

export {
  config
}

