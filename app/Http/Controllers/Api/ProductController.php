<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->paginate(1);
         //return response()->json($products);
        return new ProductCollection($products);
    }

    public function show($id)
    {
        $products = $this->product->find($id);
        //return response()->json($products);
        return new ProductResource($products);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $product = $this->product->create($data);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $product = $this->product->find($data['id']);
        $product->update($data);
        return response()->json($product);

    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto removido com sucesso']]);
    }
}
