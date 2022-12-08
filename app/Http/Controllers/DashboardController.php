<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // dd(auth()->user()->name);
        // $user = User::findOrFail(auth()->user()->id);
        $user = auth()->user();
        // $users = User::all();
        return view('dashboard', ['user'=> $user]);

    }
}
