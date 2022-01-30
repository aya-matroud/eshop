@extends('layouts.front')
@section('title',"Edit Your review")


@section('content')
    <div class="container py-lg-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                          <h5>U Writing a review for {{ $review->product->name }}</h5>
                            <form action="{{url('/update-review')}}" method="Post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="review_id" value="{{$review->id}}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="write a review">{{$review->user_review}}</textarea>
                                <button type="submit" class="btn bg-gradient-primary mt-3">Update Review</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection