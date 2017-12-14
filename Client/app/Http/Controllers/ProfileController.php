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
    public function edited(Request $req)
    {
    	$name = $req->input('name');
        $username = $req->input('username');
        $password = $req->input('password');
        $email = $req->input('email');
        $old1 = $req->input('old');
        $new = $req->input('new');
        $confirm = $req->input('confirm');
        $id = {{session('id_user')}};
        $login = DB::table('users')->where('id_user', $id)->first();
        $old2 = $





        $user = new User;
        $user->name = $name;
        $user->username = $username;
        $user->password = md5($password);
        $user->email = $email;
        $user->save();
        return redirect('/user')->with('status', 'Register berhasil!!!');
    }
}
