<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function  users(){
    $users=User::all();
    return view('layouts.Admin.users.index', compact('users'));
}
    public function  viewuser($id){
        $users=User::find($id);
        return view('layouts.Admin.users.view', compact('users'));
    }
    //
}
