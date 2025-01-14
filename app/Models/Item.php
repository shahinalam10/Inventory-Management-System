<?php

// App\Models\Item.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'brand_id', 'model_id'];

    // Relationships
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(ItemModel::class); // Ensure this points to ItemModel
    }
}
