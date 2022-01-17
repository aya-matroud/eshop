@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
<div class="container my-lg-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control firstname" value="{{\Illuminate\Support\Facades\Auth::User()->name}}"  name="fname" placeholder="enter First Name">
                                <span id="fname_error" class="text-danger "></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control lastname" value="{{\Illuminate\Support\Facades\Auth::User()->lname}}" name="lname" placeholder="enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control email" value="{{\Illuminate\Support\Facades\Auth::User()->email}}" name="email" placeholder="enter Email">
                                <span id="email_error" class="text-danger "></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control phone" value="{{\Illuminate\Support\Facades\Auth::User()->phone}}" name="phone" placeholder="enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control address1" value="{{\Illuminate\Support\Facades\Auth::User()->address1}}" name="address1" placeholder="enter Address1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control address2" name="address2" value="{{\Illuminate\Support\Facades\Auth::User()->address2}}" placeholder="enter Address2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control city" value="{{\Illuminate\Support\Facades\Auth::User()->city}}" name="city" placeholder="enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control state" value="{{\Illuminate\Support\Facades\Auth::User()->state}}" name="state" placeholder="enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control country" value="{{\Illuminate\Support\Facades\Auth::User()->country}}" name="country" placeholder="enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" required class="form-control pincode" value="{{\Illuminate\Support\Facades\Auth::User()->pincode}}" name="pincode" placeholder="enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                @if($cartItems->count() >0)
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Qty
                            </th>
                            <th>
                                Price
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total=0;
                        @endphp
                        @foreach($cartItems as $item)
                            <tr>
                                @php
                                    $total +=$item->products->selling_price*$item->prod_qty;
                                @endphp

                                <td>{{$item->products->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->products->selling_price}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <h6 class="px-2">Grand Total<span class="float-end">Rs {{ $total }}</span> </h6>
                    <hr>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                    <button type="button" class="btn btn-primary w-100 razorpay_btn">Pay with Razorpay</button>
                    <div id="paypal-button-container"></div>
                    @else
                        <h6 class="text-center">No Products in cart</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </form>
</div>



@endsection
@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endsection