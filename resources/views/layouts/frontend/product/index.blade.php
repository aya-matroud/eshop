@extends('layouts.front')
@section('title')
    {{$category->name}}
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collection /  {{$category->name}}</h6>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>

                    @foreach($products as $item)
                        <div class="col-md-3 mb-3">
                            <a href="{{url('category/' .$category->slug. '/' .$item->slug)}}">
                            <div class="card">

                                <img src="{{asset('storeimg/uploads/product/'. $item->image)}}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                    <span class="float-start">{{$item->selling_price}}</span>
                                    <span class="float-end"><s>{{$item->original_price}}</s></span>

                                </div>

                            </div>
                            </a>
                        </div>

                    @endforeach


            </div>
        </div>
    </div>
@endsection