<?php

namespace RandomState\BillPlan\Billing;

use RandomState\BillPlan\Tests\Fakes\Billable;

class SubscriptionBuilder
{
    protected BillingManager $billing;
    protected Billable $billable;

    public function __construct(BillingManager $billing, Billable $billable)
    {
        $this->billing = $billing;
        $this->billable = $billable;
    }

}