<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemModel;
use App\Models\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $itemCount = Item::count();
        $modelCount = ItemModel::count();
        $brandCount = Brand::count();

        return view('dashboard',compact('itemCount', 'modelCount', 'brandCount')); 
    }
}
