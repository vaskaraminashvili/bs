<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $categories = [];

    public function __construct(){
        $this->categories = Category::query()
        ->where('status', 1)
        ->orderBy('sort', 'DESC')
        ->get();
    }
    public function render(): View|Closure|string
    {
        return view('components.menu');
    }
}
