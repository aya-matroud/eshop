<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::all();
    return view('layouts.admin.category.index',compact('category'));
}

    public function add(){
        return view('layouts.admin.category.add');
    }
    public function insert(Request $request){
        $category=new Category();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storeimg/uploads/category' ,$filename );
            $category->image=$filename;
        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==True?'1':'0';
        $category->popular=$request->input('popular')==True?'1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_desc=$request->input('meta_desc');
        $category->save();
        return redirect('/dashboard')->with('status','category added success');
    }
       public function edit($id){
      $category=Category::find($id);
           return view('layouts.admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category=Category::find($id);
        if($request->hasFile('image')) {
            $path='storeimg/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('storeimg/uploads/category' ,$filename );
            $category->image=$filename;

        }
        $category->name=$request->input('name');
        $category->slug=$request->input('slug');
        $category->description=$request->input('description');
        $category->status=$request->input('status')==True?'1':'0';
        $category->popular=$request->input('popular')==True?'1':'0';
        $category->meta_title=$request->input('meta_title');
        $category->meta_keywords=$request->input('meta_keywords');
        $category->meta_desc=$request->input('meta_desc');
        $category->update();
        return redirect('/dashboard')->with('status','Category Updated Successfully');


    }
public function destroy($id){
    $category=Category::find($id);
    if($category->image){
        $path='storeimg/uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
    }
    $category->delete();
    return redirect('categories')->with('status','Category Deleted Successfully');
}

}
