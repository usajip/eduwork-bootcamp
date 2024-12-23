<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::withCount('product')
                    ->paginate(10);
        return view('dashboard.category_products.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category_products.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $name_check = ProductCategory::where('name', $request->name)->exists();

        if($name_check){
            return back()
                ->withInput()
                ->withErrors(['Category name already exists']);
        }else{
            $category = new ProductCategory;
            $category->name = $request->name;
            $category->save();
            return redirect()
                ->route('product-category.index')
                ->with('success', 'Category created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('dashboard.category_products.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=> ['required', 'string', 'max:255'],
        ]);

        $category_name_check = ProductCategory::where('name', $request->name)
                                    ->exists();

        if($category_name_check){
            return back()
                ->withInput()
                ->withErrors(['Category name already exists']);
        }else{
            $category = ProductCategory::findOrFail($id);
            $category->name = $request->name;
            $category->save();
            return redirect()
                ->route('product-category.index')
                ->with('success', 'Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        $product_check = Product::where('product_category_id', $category->id)->exists();
        if($product_check){
            $product = Product::where('product_category_id', $category->id)->delete();
        }
        $category->delete();

        return redirect()->route('product-category.index')
            ->with('success', 'Category deleted successfully');
    }
}
