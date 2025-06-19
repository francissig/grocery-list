<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Models\Category;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public function index()
    {
        $lists = ShoppingList::all();
        return view('shopping_lists.index', compact('lists'));
    }

    public function create()
    {
        return view('shopping_lists.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $list = ShoppingList::create(['title' => $request->title]);
        return redirect()->route('shopping_lists.show', $list);
    }

    public function show(ShoppingList $shoppingList)
    {
        $categories = Category::all();
        $shoppingList->load('items.category');
        return view('shopping_lists.show', compact('shoppingList', 'categories'));
    }
}
