@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
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
                        <textarea class="form-control" rows="5" placeholder="Description" spellcheck="false" name="description"></textarea>
                    </div>
                    <div class="col-md-12"><hr></div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="status" >
                        <label class="custom-control-label" for="customCheck1">Status</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  id="fcustomCheck1" name="popular" checked="">
                        <label class="custom-control-label" for="customCheck1">Popular</label>
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
                        <textarea class="form-control" rows="5" placeholder="Meta Description" spellcheck="false" name="meta_desc"></textarea>
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