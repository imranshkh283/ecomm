<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class MenuController extends Controller
{
    public function show(string $slug): View
    {
        $menu = Menu::where('slug', $slug)->firstOrFail();

        $childrenNames = $menu->children->pluck('name')->toArray();

        $productsQuery = Product::query()
            ->where('category', $menu->name)
            ->orWhere(
                'category',
                'like',
                "%{$menu->name}%"
            );

        if (!empty($childrenNames)) {
            $productsQuery->orWhereIn('category', $childrenNames);
        }

        $products = $productsQuery->get();

        return view('website.menu', compact('menu', 'products'));
    }
}
