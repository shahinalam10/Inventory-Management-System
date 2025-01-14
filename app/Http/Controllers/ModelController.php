<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ItemModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        $models = ItemModel::with('brand')->orderBy('id', 'desc')->paginate(10);
        return view('models.index', compact('models'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('models.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'unique:item_models,name,NULL,id,brand_id,' . $request->brand_id, // Validate uniqueness
        ]);

        ItemModel::create($request->all());
        return redirect()->route('models.index')->with('success', 'Model created successfully.');
    }

    public function edit(ItemModel $model)
    {
        $brands = Brand::all();
        return view('models.edit', compact('model', 'brands'));
    }

    public function update(Request $request, ItemModel $model)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'unique:item_models,name,' . $model->id . ',id,brand_id,' . $request->brand_id, // Validate uniqueness
        ]);

        $model->update($request->all());
        return redirect()->route('models.index')->with('success', 'Model updated successfully.');
    }

    public function destroy(ItemModel $model)
    {
        $model->delete();
        return redirect()->route('models.index')->with('success', 'Model deleted successfully.');
    }
}
