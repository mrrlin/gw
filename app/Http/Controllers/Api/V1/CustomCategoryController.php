<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCustomCategoryRequest;
use App\Http\Requests\V1\UpdateCustomCategoryRequest;
use App\Models\CustomCategory;
use App\Models\Product;
use DB;

class CustomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CustomCategory::where('parent_id', '=', null)->get();

        // return view('category-products', ['categories' => $categories]);

        // $categories = DB::table('custom_categories')->where('parent_id', '=', null)->get();

        // dd($categories);

        return view('category-products', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = CustomCategory::where('id', '=', $id)->with(['products'])->first();

        // dd($category->products);

        // $products = [];

        // foreach ($categoryProducts as $categoryProduct) $products[] = $categoryProduct->product;
        $subcategories = DB::table('custom_categories')->where('parent_id', '=', $id)->get();

        return view('category', [
            'category' => $category,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomCategory $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomCategoryRequest $request, CustomCategory $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomCategory $category)
    {
        //
    }
}
