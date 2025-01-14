<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\ItemModel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['brand', 'model'])->paginate(10);
        return view('items.index', compact('items'));
    }

    public function create()
    {
        // Get all brands to pass to the view
        $brands = Brand::all();
        
        return view('items.create', compact('brands')); // Pass brands to view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:item_models,id',
            'name' => 'unique:items,name,NULL,id,brand_id,' . $request->brand_id . ',model_id,' . $request->model_id, // Validate uniqueness
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function edit(Item $item)
    {
        $brands = Brand::all();
        $models = ItemModel::all();
        return view('items.edit', compact('item', 'brands', 'models'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:item_models,id',
            'name' => 'unique:items,name,' . $item->id . ',id,brand_id,' . $request->brand_id . ',model_id,' . $request->model_id, // Validate uniqueness
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }











// This method will fetch models based on the selected brand
public function getModelsByBrand($brandId)
{
    // Get all models related to the selected brand
    $models = ItemModel::where('brand_id', $brandId)->get();

    // Return the models as a JSON response
    return response()->json($models);
}
}
