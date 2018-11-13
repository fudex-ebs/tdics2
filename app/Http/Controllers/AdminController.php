<?php

namespace App\Http\Controllers;

use App\User;
use App\GroupReport;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
      return view('admin.dashboard');
    }

    public function users(){
      $users = User::where('role','individual')->get();
      return view('admin.users',['users' => $users]);
    }

    public function groups(){
      $groups = GroupReport::all();
      return view('admin.groups',['groups'=> $groups]);
    }
}
