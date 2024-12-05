<?php

namespace App\View\Components\Layouts;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.navbar', [
            'categories' => $this->categories
        ]);
    }
}
