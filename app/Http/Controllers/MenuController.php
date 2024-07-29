<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Support\Facades\Session;
use App\Http\Services\CartService;

class MenuController extends Controller
{
    protected $menuService;
    protected$cart;

    public function __construct(MenuService $menuService, CartService $cart)
    {
        $this->menuService = $menuService;
        $this->cart = $cart;
    }

    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getId($id);
        $products = $this->menuService->getProducts($menu, $request);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu,
            'carts' => Session::get('carts')
        ]);
    }
}
