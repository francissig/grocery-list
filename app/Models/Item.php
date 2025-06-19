<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
