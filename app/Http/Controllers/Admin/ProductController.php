<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('layouts.admin.product.index',compact('products'));
    }
    public function add(){
        $category=Category::all();
        return view('layouts.admin.product.add',compact('category'));
    }
    public function insert(Request $request){
        $product=new Product();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storeimg/uploads/product' ,$filename );
            $product->image=$filename;
        }
        $product->cate_id=$request->input('cate_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')==True?'1':'0';
        $product->trending=$request->input('trending')==True?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');
        $product->save();
        return redirect('/dashboard')->with('status','Product added successfully');
    }
    public function edit($id){
        $product=Product::find($id);
        return view('layouts.admin.product.edit',compact('product'));
    }

    public function update(Request $request,$id){
        $product=Product::find($id);
        if($request->hasFile('image')) {
            $path='storeimg/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storeimg/uploads/product' ,$filename );
            $product->image=$filename;

        }
//        dd($request->input('cate_id'));
//        $product->cate_id=$request->input('cate_id');
        $product->name=$request->input('name');
        $product->slug=$request->input('slug');
        $product->small_description=$request->input('small_description');
        $product->description=$request->input('description');
        $product->original_price=$request->input('original_price');
        $product->selling_price=$request->input('selling_price');
        $product->selling_price=$request->input('selling_price');
        $product->tax=$request->input('tax');
        $product->qty=$request->input('qty');
        $product->status=$request->input('status')==True?'1':'0';
        $product->trending=$request->input('trending')==True?'1':'0';
        $product->meta_title=$request->input('meta_title');
        $product->meta_keywords=$request->input('meta_keywords');
        $product->meta_description=$request->input('meta_description');
        $product->update();
        return redirect('products')->with('status','Product Updated Successfully');


    }
    public function destroy($id){
        $product=Product::find($id);
        $path='storeimg/uploads/product/'.$product->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $product->delete();
        return redirect('products')->with('status','Product Deleted Successfully');
    }
    //
}
