<?php

namespace App\View\Components\Admin;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class Icon extends Component
{
    public string $icon;
    public int|string $size;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $icon, int|string $size = 1)
    {
        if (is_numeric($size))
            $size .= 'rem';

        $this->icon = $icon;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render(): View
    {
        return view('components.admin.icon');
    }
}
