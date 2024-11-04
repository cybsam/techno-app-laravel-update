<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dash-user.dashboard');

    }

    public function activity(Request $request){
        return "alert to this users";
    }

    public function updateUsers(){
        return "update";
    }
}
