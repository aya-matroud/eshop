@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($category as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2">
                                <div class="my-auto">
                                    <h6 class="mb-0 text-xs">{{$item->id}} </h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-normal mb-0">{{$item->name}}</p>
                        </td>
                        <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">{{$item->description}}</span>
            </span>
                        </td>
                        <td class="align-middle text-center">
                            <div class="d-flex align-items-center">
                                <span class="me-2 text-xs"><img src="{{asset('storeimg/uploads/category/'. $item->image)}}" style="width: 42px"></span>
                            </div>
                        </td>


                        <td class="align-middle">
                            <a href="{{url('edit-prod/' .$item->id)}}" class="font-weight-normal text-xs danger" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                            </a>
                            |
                            <a href="{{url('delete-category/' .$item->id)}}" class="font-weight-normal text-xs dark" data-toggle="tooltip" data-original-title="Edit user">
                                Delete
                            </a>
                        </td>
                    </tr>
            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection