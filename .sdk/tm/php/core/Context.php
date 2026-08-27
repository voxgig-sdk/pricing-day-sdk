<?php
declare(strict_types=1);

// PricingDay SDK context

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/Operation.php';
require_once __DIR__ . '/Spec.php';
require_once __DIR__ . '/Result.php';
require_once __DIR__ . '/Response.php';
require_once __DIR__ . '/Error.php';
require_once __DIR__ . '/Helpers.php';

class PricingDayContext
{
    public string $id;
    public array $out;
    public mixed $client;
    public ?PricingDayUtility $utility;
    public PricingDayControl $ctrl;
    public array $meta;
    public ?array $config;
    public ?array $entopts;
    public ?array $options;
    public mixed $entity;
    public ?array $shared;
    public array $opmap;
    public array $data;
    public array $reqdata;
    public array $match;
    public array $reqmatch;
    public ?array $point;
    public ?PricingDaySpec $spec;
    public ?PricingDayResult $result;
    public ?PricingDayResponse $response;
    public PricingDayOperation $op;

    public function __construct(array $ctxmap = [], ?self $basectx = null)
    {
        $this->id = 'C' . random_int(10000000, 99999999);
        $this->out = [];

        $this->client = PricingDayHelpers::get_ctx_prop($ctxmap, 'client') ?? ($basectx ? $basectx->client : null);
        $this->utility = PricingDayHelpers::get_ctx_prop($ctxmap, 'utility') ?? ($basectx ? $basectx->utility : null);

        $this->ctrl = new PricingDayControl();
        $ctrl_raw = PricingDayHelpers::get_ctx_prop($ctxmap, 'ctrl');
        if (is_array($ctrl_raw)) {
            if (array_key_exists('throw', $ctrl_raw)) {
                $this->ctrl->throw_err = $ctrl_raw['throw'];
            }
            if (isset($ctrl_raw['explain']) && is_array($ctrl_raw['explain'])) {
                $this->ctrl->explain = $ctrl_raw['explain'];
            }
            if (array_key_exists('actor', $ctrl_raw)) {
                $this->ctrl->actor = $ctrl_raw['actor'];
            }
        } elseif ($basectx !== null && $basectx->ctrl !== null) {
            $this->ctrl = $basectx->ctrl;
        }

        $m = PricingDayHelpers::get_ctx_prop($ctxmap, 'meta');
        $this->meta = is_array($m) ? $m : ($basectx ? $basectx->meta ?? [] : []);

        $cfg = PricingDayHelpers::get_ctx_prop($ctxmap, 'config');
        $this->config = is_array($cfg) ? $cfg : ($basectx ? $basectx->config : null);

        $eo = PricingDayHelpers::get_ctx_prop($ctxmap, 'entopts');
        $this->entopts = is_array($eo) ? $eo : ($basectx ? $basectx->entopts : null);

        $o = PricingDayHelpers::get_ctx_prop($ctxmap, 'options');
        $this->options = is_array($o) ? $o : ($basectx ? $basectx->options : null);

        $e = PricingDayHelpers::get_ctx_prop($ctxmap, 'entity');
        $this->entity = $e ?? ($basectx ? $basectx->entity : null);

        $s = PricingDayHelpers::get_ctx_prop($ctxmap, 'shared');
        $this->shared = is_array($s) ? $s : ($basectx ? $basectx->shared : null);

        $om = PricingDayHelpers::get_ctx_prop($ctxmap, 'opmap');
        $this->opmap = is_array($om) ? $om : ($basectx ? $basectx->opmap ?? [] : []);

        $this->data = PricingDayHelpers::to_map(PricingDayHelpers::get_ctx_prop($ctxmap, 'data')) ?? [];
        $this->reqdata = PricingDayHelpers::to_map(PricingDayHelpers::get_ctx_prop($ctxmap, 'reqdata')) ?? [];
        $this->match = PricingDayHelpers::to_map(PricingDayHelpers::get_ctx_prop($ctxmap, 'match')) ?? [];
        $this->reqmatch = PricingDayHelpers::to_map(PricingDayHelpers::get_ctx_prop($ctxmap, 'reqmatch')) ?? [];

        $pt = PricingDayHelpers::get_ctx_prop($ctxmap, 'point');
        $this->point = is_array($pt) ? $pt : ($basectx ? $basectx->point : null);

        $sp = PricingDayHelpers::get_ctx_prop($ctxmap, 'spec');
        $this->spec = ($sp instanceof PricingDaySpec) ? $sp : ($basectx ? $basectx->spec : null);

        $r = PricingDayHelpers::get_ctx_prop($ctxmap, 'result');
        $this->result = ($r instanceof PricingDayResult) ? $r : ($basectx ? $basectx->result : null);

        $rp = PricingDayHelpers::get_ctx_prop($ctxmap, 'response');
        $this->response = ($rp instanceof PricingDayResponse) ? $rp : ($basectx ? $basectx->response : null);

        $opname = PricingDayHelpers::get_ctx_prop($ctxmap, 'opname') ?? '';
        $this->op = $this->resolve_op($opname);
    }

    public function resolve_op(string $opname): PricingDayOperation
    {
        // Cache key is `<entity>:<opname>` so two entities with the same op
        // (e.g. both have a "list") get distinct cached Operations. Keying
        // on opname alone caused the first-resolved entity's points to be
        // served to every subsequent entity's call.
        $entname = (is_object($this->entity) && method_exists($this->entity, 'get_name'))
            ? $this->entity->get_name()
            : '_';
        $cacheKey = $entname . ':' . $opname;

        if (isset($this->opmap[$cacheKey])) {
            return $this->opmap[$cacheKey];
        }
        if ($opname === '') {
            return new PricingDayOperation([]);
        }

        $opcfg = \Voxgig\Struct\Struct::getpath($this->config, "entity.{$entname}.op.{$opname}");

        $input = ($opname === 'update' || $opname === 'create') ? 'data' : 'match';

        $points = [];
        if (is_array($opcfg)) {
            $t = \Voxgig\Struct\Struct::getprop($opcfg, 'points');
            if (is_array($t)) {
                $points = $t;
            }
        }

        $op = new PricingDayOperation([
            'entity' => $entname,
            'name' => $opname,
            'input' => $input,
            'points' => $points,
        ]);
        $this->opmap[$cacheKey] = $op;
        return $op;
    }

    public function make_error(string $code, string $msg): PricingDayError
    {
        return new PricingDayError($code, $msg, $this);
    }
}
