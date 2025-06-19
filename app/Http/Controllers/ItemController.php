<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShoppingList;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request, ShoppingList $shoppingList)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $shoppingList->items()->create($request->only('name', 'category_id'));

        return redirect()->route('shopping_lists.show', $shoppingList)->with('success', 'Item added!');
    }

    public function toggle(Item $item)
    {
        $item->purchased = ! $item->purchased;
        $item->save();
        return back();
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $item->update($request->only('name'));
        return redirect()->route('shopping_lists.show', $item->shoppingList);
    }

    public function destroy(Item $item)
    {
        $list = $item->shoppingList;
        $item->delete();
        return redirect()->route('shopping_lists.show', $list);
    }
}
