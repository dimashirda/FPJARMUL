<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('profile');
    }
    public function user()
    {
    	return view('userprofile');
    }
    public function edit()
    {
    	return view('editprofile');
    }
}
