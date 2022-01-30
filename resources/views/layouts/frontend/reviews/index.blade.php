@extends('layouts.front')
@section('title',"Write a review")


@section('content')
    <div class="container py-lg-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($verified_purchase->count()>0)
                            <h5>U Writing a review for {{$product->name}}</h5>
                            <form action="{{url('/add-review')}}" method="Post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="write a review"></textarea>
                                <button type="submit" class="btn bg-gradient-primary mt-3">Submit Review</button>
                            </form>
                            @else
                        <div class="alert">
                            <h5>Yor are not eligible to review this product</h5>
                            <p>
                                For the trusthorthiness of the reviews, only customers who purchased
                                the product can write a review about the product.
                            </p>
                            <a href="{{url('/')}}" class="btn  btn-primary mt-3">Go to home page</a>
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection