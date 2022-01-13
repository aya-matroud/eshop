@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Registered users</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                        <th></th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <td>
                                <div class="d-flex px-2">
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-xs">{{$item->id}} </h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-normal mb-0">{{$item->name.' '.$item->lname}}</p>
                            </td>
                            <td></td>
                            <td>
            <span class="badge badge-dot me-4">
              <i class="bg-info"></i>
              <span class="text-dark text-xs">{{$item->email}}</span>
            </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="d-flex align-items-center">
                                    <span class="me-2 text-xs">{{$item->phone}}</span>
                                </div>
                            </td>


                            <td class="align-middle">
                                <a href="{{url('view-user/' .$item->id)}}" class="font-weight-normal text-xs danger" data-toggle="tooltip" data-original-title="Edit user">
                                    View
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