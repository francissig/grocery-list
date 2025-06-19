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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $list = ShoppingList::create($validated);

        return redirect()->route('shopping_lists.edit', $list)->with('success', 'List created successfully!');
    }


    public function show(ShoppingList $shoppingList)
    {
        $categories = Category::all();
        $shoppingList->load('items.category');
        return view('shopping_lists.show', compact('shoppingList', 'categories'));
    }

    public function edit(ShoppingList $shoppingList)
    {
        $categories = \App\Models\Category::all();

        return view('shopping_lists.edit', compact('shoppingList', 'categories'));
    }

    public function update(Request $request, ShoppingList $shoppingList)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $shoppingList->update($validated);
        return redirect()->route('shopping_lists.index')->with('success', 'List updated successfully!');
    }

    public function destroy(ShoppingList $shoppingList)
    {
        $shoppingList->delete();
        return redirect()->route('shopping_lists.index')->with('success', 'List deleted!');
    }
}
