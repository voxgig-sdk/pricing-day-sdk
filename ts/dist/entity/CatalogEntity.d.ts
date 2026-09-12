import { PricingDayEntityBase } from '../PricingDayEntityBase';
import type { PricingDaySDK } from '../PricingDaySDK';
import type { Control } from '../types';
import type { Catalog, CatalogLoadMatch } from '../PricingDayTypes';
declare class CatalogEntity extends PricingDayEntityBase<Catalog> {
    constructor(client: PricingDaySDK, entopts: any);
    make(this: CatalogEntity): CatalogEntity;
    load(this: any, reqmatch?: CatalogLoadMatch, ctrl?: Control): Promise<CatalogEntity>;
}
export { CatalogEntity };
