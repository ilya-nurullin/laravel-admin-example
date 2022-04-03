<?php

namespace App\Services;

use App\Contracts\CalculatorInterface;
use App\Contracts\NotificationService;

class CalculatorNotificationService implements CalculatorInterface
{
    private int $res;
    private NotificationService $service;

    public function __construct(NotificationService $service)
    {
        $this->res = 0;
        $this->service = $service;
    }

    public function add($v)
    {
        $this->res += $v;
        return $this;
    }

    public function sub($v)
    {
        $this->res -= $v;
        return $this;
    }

    public function mul($v)
    {
        $this->res *= $v;
        return $this;
    }

    public function res()
    {
        $this->service->notify(1, "calc res = {$this->res}");
        return $this->res;
    }
}
