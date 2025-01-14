<?php

// App\Models\ItemModel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    // Specify the table name explicitly
    protected $table = 'item_models';

    protected $fillable = ['name', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
