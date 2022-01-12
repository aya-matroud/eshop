<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Auth::check()) {

            $prod_check = Product::where('id', $product_id)->first();
            if ($prod_check) {

                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . "Already Added To Cart"]);
                } else {

                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . "Added To Cart"]);


                }
            }
        } else {
            return response()->json(['status' => "Log in to continue"]);
        }
    }
    public function viewcart(){

        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('layouts.frontend.cart',compact('cartItems'));
     }
    public function deleteproduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartItem=Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product Deleted Successfully"]);
            } else {
                return response()->json(['status' => "Log in to continue"]);
            }

            }
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::check()) {

            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart=Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty=$product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }

        }
    }

}
