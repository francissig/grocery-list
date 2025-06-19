<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use App\Models\Category;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::orderBy('updated_at', 'desc')->get();
        return view('shopping_lists.index', compact('shoppingLists'));
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

    public function edit(ShoppingList $shoppingList)
    {
        return view('shopping_lists.edit', compact('shoppingList'));
    }

    public function update(Request $request, ShoppingList $shoppingList)
    {
        $request->validate(['title' => 'required|string|max:255']);
        $shoppingList->update(['title' => $request->title]);
        return redirect()->route('shopping_lists.show', $shoppingList);
    }

    public function destroy(ShoppingList $shoppingList)
    {
        $shoppingList->delete();
        return redirect()->route('shopping_lists.index')->with('success', 'List deleted!');
    }
}
