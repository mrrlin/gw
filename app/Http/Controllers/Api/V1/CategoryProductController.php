<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCategoryProductRequest;
use App\Http\Requests\V1\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;
use App\Models\CustomCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
// use LengthAwarePaginator;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryProduct::all();

        return view('categories', ['categories' => $categories]);
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
    public function store(Request $request)
    {
        CategoryProduct::create($request->all());
    }


    /**
     * Display the specified resource.
     */
    // public function show($id): array
    // {
    //     $categoryProducts = Product::find($id)->categoryProducts;

    //     $categories = [];

    //     foreach ($categoryProducts as $categoryProduct) $categories[] = $categoryProduct->category;

    //     return $categories;
    // }

    public function show($id)
    {
        // $perPage = 10;
        $category = CustomCategory::find($id);

        $categoryProducts = $category->categoryProducts;

        // $subcategories = CustomCategory::find(['parent_id' => $id]);
        $subcategories = DB::table('custom_categories')->where('parent_id', '=', $id)->get();


        $products = [];

        foreach ($categoryProducts as $categoryProduct) $products[] = $categoryProduct->product;

        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $currentProducts = $products->slice(($currentPage - 1) * $perPage, $perPage);

        // $productsPaginator = new LengthAwarePaginator(
        //     $currentProducts,
        //     $products->count(),
        //     $perPage,
        //     $currentPage,
        //     ['path' => LengthAwarePaginator::resolveCurrentPath()]
        // );

        // return view('category', compact('productsPaginator'), ['category' => $category, 'subcategories' => $subcategories, 'products' => $products]);
        return view('category', ['category' => $category, 'subcategories' => $subcategories, 'products' => $products]);

        // return view('categories', ['category' => $category, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProductRequest $request, CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        //
    }
}
