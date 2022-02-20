<?php

namespace App\View\Components\Contracts;

trait AsTable {
    public function getTableHeaders(): array
    {
        return collect($this->attributes)->except($this->hidden)->keys()->toArray();
    }

    abstract function getEditLink(): string;


    abstract public function getRemoveLink(): string;
}
