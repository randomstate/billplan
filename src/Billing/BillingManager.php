<?php

namespace RandomState\BillPlan\Billing;

use Closure;
use RandomState\BillPlan\Plan;

class BillingManager
{
    protected array $plans = [];
    protected array $subscriptionsResolver = [];

    public function register(Plan $plan)
    {
        $this->plans[$plan->getId()] = $plan;

        return $this;
    }

    public function resolveSubscriptionsUsing(Closure $resolver, $billableClass = null): static
    {
        $this->subscriptionsResolver[$billableClass ?? 'default'] = $resolver;

        return $this;
    }

    public function getPlan($id)
    {
        return $this->plans[$id] ?? null;
    }

    public function getSubscriptions($billable)
    {
        $resolver = $this->subscriptionsResolver[$billable::class] ?? $this->subscriptionsResolver['default'];

        return $resolver($this, $billable);
    }
}