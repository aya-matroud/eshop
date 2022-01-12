@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/' .$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$category->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                        </div>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="description">
                            {{$category->description}}
                        </textarea>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="status" {{$category->status == "1" ? 'checked':''}} >
                        <label class="custom-control-label"  for="customCheck1">Status</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  id="fcustomCheck1" name="popular" checked="" {{$category->popular == "1" ? 'checked':''}}>
                        <label class="custom-control-label" for="customCheck1">Popular</label>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                        </div>
                    </div>

                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Keywords" spellcheck="false" name="meta_keywords">
                            {{$category->meta_keywords}}
                        </textarea>
                    </div>
                    <div class=" input-group input-group-dynamic">
                        <textarea class="form-control" rows="5" placeholder="Meta Description" spellcheck="false" name="meta_desc">
                            {{$category->meta_desc}}
                        </textarea>
                    </div>
                    @if($category->image)
                        <img src="{{asset('storeimg/uploads/category/'. $category->image)}}" alt="category image">
                    @endif
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