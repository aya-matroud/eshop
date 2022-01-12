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
                <a href="{{url('cart')}}">
                    Cart
                </a>

            </h6>
        </div>
    </div>
    <div class="container my-lg-5">
        <div class="card">
            <div class="card-body">

                @php
                $total=0;
                @endphp

                @foreach($cartItems as $item)
                <div class="row product_data">
                    <div class="col-md-2 my-auto">

                        <img src="{{asset('storeimg/uploads/product/'. $item->products->image)}}" height="70px" width="70px" alt="image here">

                    </div>
                    <div class="col-md-3 my-auto">
                       <h6>{{$item->products->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Rs {{$item->products->selling_price}}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group input-group-sm input-group-outline text-center mb-3" style="width: 130px">
                            <span class="badge bg-gradient-secondary changeQuantity decrement-btn">-</span>
                            <input type="text" name="qty" value="{{$item->prod_qty}}" class="form-control qty-input" style="width: 12px">
                            <span class="badge bg-gradient-secondary changeQuantity increment-btn">+</span>
                    </div>
                </div>
                    <div class="col-md-2 my-auto">
                   <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i> Remove</button>
                          </div>
                </div>

                    @php
                        $total +=$item->products->selling_price*$item->prod_qty;
                    @endphp

                 @endforeach

        </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer">
                <h6 class="float-start">Total Price: {{$total}}</h6>
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed To Checkout</a>
            </div>
    </div>

@endsection