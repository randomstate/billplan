<?php

namespace RandomState\BillPlan;

use DateInterval;

class FreeTrial
{
    protected int $trialDays;
    private DateInterval $resetInterval;

    public function __construct($trialDays = 0)
    {
        $this->trialDays = $trialDays;
    }

    public static function for(int $days): static
    {
        return new static($days);
    }

    public function resetEvery(DateInterval $interval): static
    {
        $this->resetInterval = $interval;

        return $this;
    }

    public function getDays()
    {
        return $this->trialDays;
    }
}