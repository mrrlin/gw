<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreCustomPageRequest;
use App\Http\Requests\V1\UpdateCustomPageRequest;
use App\Models\CustomPage;

class CustomPageController extends Controller
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
     */
    public function store(StoreCustomPageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomPage $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomPage $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomPageRequest $request, CustomPage $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomPage $page)
    {
        //
    }
}
