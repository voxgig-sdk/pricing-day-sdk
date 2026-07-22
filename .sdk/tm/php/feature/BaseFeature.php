<?php
declare(strict_types=1);

// PricingDay SDK base feature

class PricingDayBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    // Positions this feature when added via the client `extend` option:
    // "__before__" / "__after__" / "__replace__" name an already-added
    // feature (mirrors the ts feature `_options`). Declared so setting it
    // on an extension instance avoids the dynamic-property deprecation.
    public ?array $_options = null;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(PricingDayContext $ctx, array $options): void {}
    public function PostConstruct(PricingDayContext $ctx): void {}
    public function PostConstructEntity(PricingDayContext $ctx): void {}
    public function SetData(PricingDayContext $ctx): void {}
    public function GetData(PricingDayContext $ctx): void {}
    public function GetMatch(PricingDayContext $ctx): void {}
    public function SetMatch(PricingDayContext $ctx): void {}
    public function PrePoint(PricingDayContext $ctx): void {}
    public function PreSpec(PricingDayContext $ctx): void {}
    public function PreRequest(PricingDayContext $ctx): void {}
    public function PreResponse(PricingDayContext $ctx): void {}
    public function PreResult(PricingDayContext $ctx): void {}
    public function PreDone(PricingDayContext $ctx): void {}
    public function PreUnexpected(PricingDayContext $ctx): void {}
}
