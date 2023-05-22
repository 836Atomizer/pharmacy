<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
       return Brand::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return JsonResponse
     */
    public function store(BrandRequest $request): JsonResponse
    {
        $request->validated();
        $brand = new Brand;
        $brand->create($request->all());
        return response()->json(
            [
                'message' => 'Success register Brand.'
            ]
        );
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
     * @param BrandRequest $request
     * @param Brand $brand
     * @return JsonResponse
     */
    public function update(BrandRequest $request, Brand $brand): JsonResponse
    {
        $request->validated();
        $brand->update($request->all());
        return response()->json(
            [
                'message' => 'Update brand successfully.'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return JsonResponse
     */
    public function destroy(Brand $brand): JsonResponse
    {
        $brand->delete();
        return response()->json(
            [
                'message' => 'Delete brand successfully.'
            ]
        );
    }
}
