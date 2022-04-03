<?php

namespace App\Contracts;

interface CalculatorInterface
{
    public function add($v);

    public function sub($v);

    public function mul($v);

    public function res();
}
