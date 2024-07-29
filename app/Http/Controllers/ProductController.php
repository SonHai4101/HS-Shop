<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    protected $productService;
    protected $cart;

    public function __construct(ProductService $productService, CartService $cart)
    {
        $this->productService = $productService;
        $this->cart = $cart;
    }
    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'carts' => Session::get('carts')
        ]);
    }
}
