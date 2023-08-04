<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreFavoriteRequest;
use App\Http\Requests\V1\UpdateFavoriteRequest;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * @return JsonResponse|void
     */
    public function store(StoreFavoriteRequest $request)
    {
        if (Favorite::find($request->product_id)) {
            return response()->json([
                'message' => 'You have already added this product to your favorites'
            ], 412);
        }

        Favorite::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = [];
        if(Auth::check()) {
            $user_id = intval(Auth::user()->id);
            $favorites = Favorite::where('user_id', '=', $user_id)->get();

            $product_ids = [];
            foreach ($favorites as $favorite) {
                $product_ids[] = $favorite->product_id;
            }

            $products = Product::whereIn('id', $product_ids)->get();
        }


        return view('favorites', ['products' => $products]);

    }

    public function favoritesAdd(Request $request)
    {
        $message = 'Пользователь не авторизован';
        if(Auth::check()) {
            $user_id = intval(Auth::user()->id);
            $product_id = $request->product_id;

            $favorite = Favorite::where(['user_id' => $user_id, 'product_id' => $product_id])->first();
            if($favorite) {
                $favorite->delete();
                $message = 'Удалено из избранного';
            } else {
                Favorite::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id
                ]);
                $message = 'Добавлено в избранное';
            }
        }

        return response()->json([
            'message' => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
}
