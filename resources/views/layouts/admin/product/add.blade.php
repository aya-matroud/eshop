@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                 <div class="col-md-12">
                    <select class="form-select" name="cate_id" aria-label="Default select example">
                     <option value="">Select A Category</option>
                        @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                     </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <div class="input-group input-group-outline my-3">--}}
{{--                            <label class="form-label">Slug</label>--}}
{{--                            <input type="text" class="form-control" name="slug">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Small Description" spellcheck="false" name="small_description"></textarea>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="description"></textarea>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Original Price</label>
                            <input type="number" class="form-control" name="original_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Selling Price</label>
                            <input type="number" class="form-control" name="selling_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Tax</label>
                            <input type="number" class="form-control" name="tax">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty">
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="status" >
                        <label class="custom-control-label" for="customCheck1">Status</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  id="fcustomCheck1" name="trending" checked="">
                        <label class="custom-control-label" for="customCheck1">Trending</label>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Keywords" spellcheck="false" name="meta_keywords"></textarea>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Description" spellcheck="false" name="meta_description"></textarea>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label"></label>
                        <input type="file" class="form-control btn btn-fab btn-round btn-primary" name="image">
                    </div>
                    {{--                    <div class="col-md-12">--}}
                    {{--                  <input type="file" class="form-control" name="image">--}}
                    {{--                    </div>--}}


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection