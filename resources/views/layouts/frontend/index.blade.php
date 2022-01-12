@extends('layouts.front')
@section('title')
    Welcome to E-Shop
@endsection
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mb-4">
            <div class="carousel-item">
                <div class="page-header min-vh-75 m-3 border-radius-xl w-100" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-3-min.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 my-auto">
                                <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Pricing Plans</h4>
                                <h1 class="text-white fadeIn2 fadeInBottom">Work with the rockets</h1>
                                <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Wealth creation is an evolutionarily recent positive-sum game. Status is an old zero-sum game. Those attacking wealth creation are often just seeking status.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-1-min.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 my-auto">
                                <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Our Team</h4>
                                <h1 class="text-white fadeIn2 fadeInBottom">Work with the best</h1>
                                <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Free people make free choices. Free choices mean you get unequal outcomes. You can have freedom, or you can have equal outcomes. You can’t have both.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
                <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('https://demos.creative-tim.com/test/material-dashboard-pro/assets/img/products/product-2-min.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="container">
                        <div class="col-lg-6 my-auto">
                            <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Pricing Plans</h4>
                            <h1 class="text-white fadeIn2 fadeInBottom">Work with the rockets</h1>
                            <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Wealth creation is an evolutionarily recent positive-sum game. Status is an old zero-sum game. Those attacking wealth creation are often just seeking status.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="min-vh-75 position-absolute w-100 top-0">
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>

        <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel feutured-carousel owl-theme">
                @foreach($featured_products as $item)
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('storeimg/uploads/product/'. $item->image)}}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <span class="float-start">{{$item->selling_price}}</span>
                                <span class="float-end"><s>{{$item->original_price}}</s></span>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Categories</h2>
            <div class="owl-carousel feutured-carousel owl-theme">
                @foreach($trending_categories as $item)
                    <a href="{{url('view-category/' .$item->slug)}}">
                    <div class="item">
                        <div class="card">
                            <img src="{{asset('storeimg/uploads/category/'. $item->image)}}" alt="Category Image">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <p>{{$item->description}}</p>

                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

        </div>
    </div>
</div>
    @endsection
@section('scripts')
    <script>
        $('.feutured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
  @endsection