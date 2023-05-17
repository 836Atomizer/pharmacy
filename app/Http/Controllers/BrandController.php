<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       return Brand::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return void
     */
    public function store(BrandRequest $request)
    {
        $request->validated();
        $brand = new Brand;
        $brand->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return Brand
     */
    public function show(Brand $brand): Brand
    {
        return $brand;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Brand $brand
     * @return Response
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
