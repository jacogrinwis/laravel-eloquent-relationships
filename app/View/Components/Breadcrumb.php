<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $segments;

    public function __construct()
    {
        $this->segments = collect(request()->segments())->map(function ($segment, $key) {
            $url = url(implode('/', array_slice(request()->segments(), 0, $key + 1)));
            return [
                'label' => ucfirst($segment),
                'url' => $url
            ];
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
