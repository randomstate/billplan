<?php

namespace RandomState\BillPlan;

interface Entitlement
{
    public function getName() : string;
    public function isWithinLimits($billable) : bool;
}