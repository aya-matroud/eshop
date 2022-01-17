@extends('layouts.front')
@section('title',$product->name)


@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('/add-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="product_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}">
                    Collections
                </a>/
                <a href="{{url('category/'.$product->category->slug)}}">
                    {{$product->category->name}}
                </a>
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">
                    {{$product->name}}
                </a>
            </h6>
        </div>
    </div>


    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="mb-4 border-right">
                        <img src="{{asset('storeimg/uploads/product/'. $product->image)}}" alt="Product Image" class="w-30">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">

                            {{$product->name}}
                            @if($product->trending=='1')
                                <label style="font-size: 16px" class="float-end badge bg-danger trending_tag">trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label  class="me-3">Original Price : <s>Rs{{$product->original_price}}</s></label>
                        <label  class="fw-bold">Selling Price : <s>Rs{{$product->selling_price}}</s></label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if($product->qty > 0)
                            <label  class="badge bg-success">In stock</label>
                        @else
                            <label  class="badge bg-danger">Out Of stock</label>
                        @endif
                        <div class="row mt-2">
                            {{--                        <div class="col-md-2">--}}
                            {{--                            <label for="Quantity">Quantity</label>--}}
                            {{--                            <div class="input-group text-center mb-3">--}}
                            {{--                                <span class="input-group-text">-</span>--}}
                            {{--                                <input type="text" name="qty" value="1" class="form-control">--}}
                            {{--                                <span class="input-group-text">+</span>--}}
                            {{--                            </div>--}}
                            {{--                        </div>--}}



                            <div class="col-md-3">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group input-group-sm input-group-outline text-center mb-3">
                                    <span class="badge bg-gradient-secondary decrement-btn">-</span>
                                    <input type="text" name="qty" value="1" class="form-control qty-input" style="width: 12px">
                                    <span class="badge bg-gradient-secondary increment-btn">+</span>
                                </div>
                            </div>

                            <div class="col-md-9" style="padding-top: 7px">
                                <br>
                                @if($product->qty > 0)
                                    <button type="button" class="btn btn-primary me-3 AddToCartBtn float-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add To Wishlist <i class="fa fa-heart"></i> </button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>Description</h3>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate This Product
                    </button>


                </div>

            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.AddToCartBtn').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--              var product_id=$(this).closest('.product_data').find('.prod_id').val();--}}
{{--                var product_qty=$(this).closest('.product_data').find('.qty-input').val();--}}
{{--                $.ajaxSetup({--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                    }--}}
{{--                });--}}
{{--               $.ajax({--}}
{{--                 method:"POST",--}}
{{--                   url:"/add-to-cart",--}}
{{--                   data:--}}
{{--                       {--}}
{{--                           'product_id':product_id,--}}
{{--                           'product_qty':product_qty,--}}
{{--                       },--}}
{{--                    success:function (response) {--}}
{{--                        swal(response.status);--}}
{{--                    }--}}

{{--               });--}}
{{--            });--}}

{{--            $('.increment-btn').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                var inc_value=$('.qty-input').val();--}}
{{--                var value=parseInt(inc_value,10);--}}
{{--                value=isNaN(value)? 0 : value;--}}
{{--                if(value<10){--}}
{{--                    value++;--}}
{{--                    $('.qty-input').val(value);--}}
{{--                }--}}
{{--                --}}
{{--            });--}}
{{--            $('.decrement-btn').click(function (e) {--}}
{{--                e.preventDefault();--}}
{{--                var inc_value=$('.qty-input').val();--}}
{{--                var value=parseInt(inc_value,10);--}}
{{--                value=isNaN(value)? 0 : value;--}}
{{--                if(value>1){--}}
{{--                    value--;--}}
{{--                    $('.qty-input').val(value);--}}
{{--                }--}}

{{--            });--}}

{{--        });--}}
{{--    </script>--}}

{{--    @endsection--}}