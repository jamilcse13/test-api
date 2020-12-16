<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * @return ProductResourceCollection
     */
    public function index(): ProductResourceCollection
    {
        return new ProductResourceCollection(Product::paginate());
    }

    /**
     * @param Request $request
     * @return ProductResource
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'unit_buying_cost' => 'required',
            'unit_selling_cost' => 'required',
            'quantity' => 'required',
            'tax_rate' => 'required',
            'sold_out_flag' => 'required',
            'created_by' => 'required'

        ]);

        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    public function Update(Product $product, Request $request): ProductResource
    {
        $product->update($request->all());

        return new ProductResource($product);
    }

    /**
     * @param Product $product
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
