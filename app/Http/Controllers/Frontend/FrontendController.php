<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rating;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $featured_products=Product::where('trending','1')->take(12)->get();
        $trending_categories=Category::where('popular','1')->take(6)->get();
        return view('layouts.frontend.index',compact('featured_products','trending_categories'));
    }
    public function category(){
        $category=Category::where('status','0')->get();
        return view('layouts.frontend.category',compact('category'));
    }
    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category=Category::where('slug',$slug)->first();
            $products=Product::where('cate_id',$category->id)->where('status',0)->get();
            return view('layouts.frontend.product.index',compact('category','products'));
        }
         else{
         return redirect('/')->with('status',"slug dosent exist");
       }
    }
    public function productview($cate_slug,$prod_slug){

        if(Category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){


                $product=Product::where('slug',$prod_slug)->first();
                $rating=Rating::where('prod_id',$product->id)->get();
                $rating_sum=Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating=Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews=Review::where('prod_id',$product->id)->get();

                if($rating->count() > 0){
                    $rating_value=$rating_sum/$rating->count();
                }
                else{
                    $rating_value=0;
                }

                return view('layouts.frontend.product.view',compact('product','rating','user_rating','rating_value','reviews'));
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else{
            return redirect('/')->with('status',"No such category found");
        }
    }


    public function productlistAjax(){

        $products=Product::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item)
        {
            $data[]=$item['name'];
        }
        return $data;
    }
    public function searchProduct(Request $request){
        $searched_product=$request->product_name;
        if($searched_product != "")
        {
            $product=Product::where("name","LIKE","%$searched_product%")->first();
            if($product)
            {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status","No Products matched your search");
            }
        }
       else{
           return redirect()->back();
           }

    }
    //
}
