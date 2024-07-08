<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;


class CartService 
{
    public function create($request) {
        $qty = (int)$request->input('num-product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session()->flash('error','Số lượng hoặc sản phẩm không chính xác');
            return false;
        }
        // Session()->forget('$carts');
        $carts = Session::get('carts');
        
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
         }

         $exists = Arr::exists($carts, $product_id);
         if ($exists) { 
            $qtyNew = $carts[$product_id] + $qty;
            Session::put('carts', [
                $product_id => $qtyNew
            ]);
            return true;
         }
         Session::put('carts', [
            $product_id => $qty
        ]);
        return true;
    }

    public function getProduct() {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
        
    }
}