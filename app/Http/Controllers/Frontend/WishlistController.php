<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Product;
use App\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function index(){
        $wishlist = wishlist::where('user_id',Auth::id())->get();
        return view('layouts.frontend.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
          if (Auth::check()) {
            $prod_id = $request->input('product_id');

            if (Product::find($prod_id)) {
                    $wish=new wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                    return response()->json(['status' => "Product Added To Wishlist"]);
                }
         else {
            return response()->json(['status' => "Product doesnot exist"]);
        }
     }
          else{
              return response()->json(['status' => "Log in to continue"]);

          }
    }


    public function deleteitem(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish=wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => "Item Removed From Wishlist"]);
            } else {
                return response()->json(['status' => "Log in to continue"]);
            }

        }
    }
}
