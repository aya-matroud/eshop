@extends('layouts.front')
@section('title',$product->name)


@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}">
                    Collections
                </a>
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
                    @if($product->qty>0)
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
                            <button type="button" class="btn btn-success me-3 float-start">Add To Wishlist <i class="fa fa-heart"></i> </button>
                            <button type="button" class="btn btn-primary me-3 AddToCartBtn float-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
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