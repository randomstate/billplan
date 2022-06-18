<?php

namespace RandomState\BillPlan;

use Closure;

class Plan
{
    protected string $id;

    /**
     * @var Entitlement[]
     */
    protected array $entitlements;

    /**
     * @var array<string, mixed>
     */
    protected array $attributes;

    protected ?FreeTrial $freeTrial = null;

    protected ?Closure $eligibilityCheck = null;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function withAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function withEntitlements(array $entitlements)
    {
        $this->entitlements = $entitlements;

        return $this;
    }

    public function withFreeTrial(FreeTrial $trial)
    {
        $this->freeTrial = $trial;
        
        return $this;
    }

    public function getAttribute(string $key)
    {
        return $this->attributes[$key] ?? null;
    }

    public function getEntitlements()
    {
        return $this->entitlements;
    }

    public function getFreeTrial()
    {
        return $this->freeTrial;
    }

    public function setEligibilityCheck(Closure $checker)
    {
        $this->eligibilityCheck = $checker;

        return $this;
    }

    public function withinEntitlementLimits($billable): bool
    {
        $withinLimits = true;

        foreach($this->entitlements as $entitlement) {
            $withinLimits = $withinLimits && $entitlement->isWithinLimits($billable);
        }

        return $withinLimits;
    }
}