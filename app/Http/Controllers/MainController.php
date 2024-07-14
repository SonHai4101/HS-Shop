<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\CartService;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected$cart;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product, CartService $cart)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->cart = $cart;
    }


    public function index() {
        $cartProduct = $this->cart->getProduct();
        return view('home', [
            'title' => 'Shop HS',
            'sliders' => $this->slider->showSlider(),
            'menus' => $this->menu->showMenu(),
            'products' => $this->product->getProduct(),
            // 'products' => $this->cart->getProduct()
            'carts' => Session::get('carts')
        ]);
    }

    public function loadProduct(Request $request) {
        $page = $request->input('page', 0);
        $result = $this->product->getProduct($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html'=> '']);
    }
}
