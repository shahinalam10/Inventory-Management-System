<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255|unique:brands,name']);
        Brand::create($request->all());
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate(['name' => 'required|string|max:255|unique:brands,name']);
        $brand->update($request->all());
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}

