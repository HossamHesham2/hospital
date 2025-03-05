<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class userSideBar extends Component
{
    /**
     * Create a new component instance.
     */
    public $patient;

    public function __construct()
    {
        $this->patient = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-side-bar');
    }
}
