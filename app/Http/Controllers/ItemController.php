<?php

namespace App\Http\Controllers;

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

        $shoppingList->items()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return back();
    }
}
