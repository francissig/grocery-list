<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'category_id', 'shopping_list_id', 'purchased'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
