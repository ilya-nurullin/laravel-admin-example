<?php

namespace App\Services;

use App\Contracts\CalculatorInterface;

class CalculatorService implements CalculatorInterface
{
    private int $res;

    public function __construct()
    {
        $this->res = 0;
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
        return $this->res;
    }
}
