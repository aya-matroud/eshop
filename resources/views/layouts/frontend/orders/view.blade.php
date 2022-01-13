@extends('layouts.front')
@section('title')
    My Orders
@endsection
@section('content')
    <div class="container py-lg-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="text-white">Order View
                            <a href="{{url('my-orders')}}" class="btn btn-white btn-rounded float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Shipping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-2">{{$orders->fname}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$orders->lname}}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{$orders->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2">{{$orders->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{$orders->address1}},
                                    {{$orders->address2}},
                                    {{$orders->city}},
                                    {{$orders->state}},
                                    {{$orders->country}}
                                </div>

                                <label for="">Zip Code</label>
                                <div class="border p-2">{{$orders->pincode}}</div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders->orderitems as $item)
                                        <tr>
                                            <td>{{$item->products->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                <img src="{{asset('storeimg/uploads/product/'. $item->products->image)}}" width="50px" alt="Product Image">
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total:<span class="float-end">{{$orders->total_price}}</span></h4>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection