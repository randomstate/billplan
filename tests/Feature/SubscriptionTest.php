<?php

namespace RandomState\BillPlan\Tests\Feature;

use RandomState\BillPlan\Billing\BillingManager;
use RandomState\BillPlan\Plan;
use RandomState\BillPlan\Tests\Fakes\Billable;
use RandomState\BillPlan\Tests\TestCase;

class SubscriptionTest extends TestCase
{


    /**
     * @test
     */
    public function can_check_if_subscribed_to_a_plan()
    {
        $billing = new BillingManager();
        $billable = new Billable();

        $plan = new Plan('test-123');

        $billing->subscribe($billable)->to('test-123');

        $this->assertTrue($billable->subscribed('test-123'));
    }
    
    /**
     * @test
     */
    public function can_get_currently_subscribed_plans() 
    {

    }
}