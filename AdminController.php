<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
         $countUser = User::count();
         return view('admin.dashboard', compact('countUser'));
     }

   
}

