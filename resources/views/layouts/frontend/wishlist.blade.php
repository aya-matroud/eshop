@extends('layouts.front')
@section('title')
    My Cart
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('/')}}">
                    Home
                </a> /
                <a href="{{url('wishlist')}}">
                    Wishlist
                </a>

            </h6>
        </div>
    </div>
    <div class="container my-lg-5">
        <div class="card shadow wishlistitems">
            <div class="card-body">
                @if($wishlist->count()>0)

                       @foreach($wishlist as $item)
                            <div class="row product_data">
                                <div class="col-md-2 my-auto">

                                    <img src="{{asset('storeimg/uploads/product/'. $item->products->image)}}" height="70px" width="70px" alt="image here">

                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>{{$item->products->name}}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <h6>Rs {{$item->products->selling_price}}</h6>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                                    @if($item->products->qty >= $item->prod_qty)
                                        <label for="Quantity">Quantity</label>
                                        <div class="input-group input-group-sm input-group-outline text-center mb-3" style="width: 130px">
                                            <span class="badge bg-gradient-secondary decrement-btn">-</span>
                                            <input type="text" name="qty" value="1" class="form-control qty-input" style="width: 12px">
                                            <span class="badge bg-gradient-secondary increment-btn">+</span>
                                        </div>

                                    @else
                                        <h6>Out Of Stock</h6>
                                    @endif
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-success AddToCartBtn"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                </div>
                                <div class="col-md-2 my-auto">
                                    <button class="btn btn-danger remove-wishlist-item"> <i class="fa fa-trash"></i> Remove</button>
                                </div>
                            </div>



                        @endforeach




                @else
                    <h4>There are no product in your wishlist</h4>
                @endif
            </div>

        </div>
    </div>

@endsection