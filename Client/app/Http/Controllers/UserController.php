<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadForm()
    {
    	return view('user.upload');	
    }
}