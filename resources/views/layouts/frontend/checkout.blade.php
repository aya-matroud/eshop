@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
<div class="container my-lg-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Address1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Address2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter City">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter State">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-lg input-group-outline my-3">
                                <input type="text" class="form-control" placeholder="enter Pin Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
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
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{$item->products->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->products->selling_price}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary">Place Order</button>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
