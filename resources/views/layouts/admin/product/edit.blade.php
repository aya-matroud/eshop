@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/' .$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <select class="form-select" aria-label="Default select example"  name="cate_id">
                            <option value="" >{{$product->category->name}}</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" value="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" value="slug" name="slug">
                        </div>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Small Description" spellcheck="false" name="small_description">
                            {{$product->small_description}}
                        </textarea>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="description">
                            {{$product->description}}
                        </textarea>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Original Price</label>
                            <input type="number" class="form-control" value="{{$product->original_price}}" name="original_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Selling Price</label>
                            <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Tax</label>
                            <input type="number" class="form-control" value="{{$product->tax}}" name="tax">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" value="{{$product->qty}}" name="qty">
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1"  name="status" {{$product->status == "1" ? 'checked':''}} >
                        <label class="custom-control-label" for="customCheck1">Status</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  id="fcustomCheck1" name="trending"   {{$product->trending == "1" ? 'checked':''}}>
                        <label class="custom-control-label" for="customCheck1">Trending</label>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" value="meta_title" name="meta_title">
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Keywords" spellcheck="false" name="meta_keywords">
                            {{$product->meta_keywords}}
                        </textarea>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Description" spellcheck="false" name="meta_description">
                            {{$product->meta_description}}
                        </textarea>
                    </div>
                    <div class="col-md-12"><hr></div>
                    @if($product->image)
                        <img src="{{asset('storeimg/uploads/product/'. $product->image)}}" alt="product image">
                    @endif
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label"></label>
                        <input type="file" class="form-control btn btn-fab btn-round btn-primary" name="image">
                    </div>
                    {{--                    <div class="col-md-12">--}}
                    {{--                  <input type="file" class="form-control" name="image">--}}
                    {{--                    </div>--}}


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" >Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection