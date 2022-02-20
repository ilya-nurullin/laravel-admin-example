<?php

namespace App\View\Components\Admin;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\View\Component;

class Table extends Component
{
    public EloquentCollection $collection;
    public array $headers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(EloquentCollection $collection, array|null $headers = null)
    {
        $this->collection = $collection;
        $this->headers = $headers ?? $collection[0]->getTableHeaders();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table');
    }
}
