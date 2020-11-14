<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Category;
use App\Brand;

class SidebarComponent extends Component
{
    public $categories;
    public $mybrand;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::all();
        $this->mybrand = Brand::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-component');
    }
}
