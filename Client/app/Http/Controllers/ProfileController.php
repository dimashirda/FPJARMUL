<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
    	//dd($req);
        $name = $req->input('name');
        //dd($name);
        $username = $req->input('username');
        //$password = $req->input('password');
        $email = $req->input('email');
        $old1 = $req->input('old');
        //dd($old1);
        $new = $req->input('new');
        //dd($new);
        $confirm = $req->input('confirm');
        //dd($confirm);
        $id = session('id');
        //dd($id);
        $login = DB::table('users')->where('id_user', $id)->first();
        //dd($login);
        $old2 = $login->password;
        //dd($old2);
        $old1=md5($old1);
        //dd($old1);
        if($old1 == $old2)
        {   
            if($new == $confirm)
            {
                $login = DB::table('users')->where('id_user', $id)
                ->update([
                    'name'=>$name,
                    'email'=>$email,
                    'username'=>$username,
                    'password'=>md5($new)]);
                //dd($login);
                $login = DB::table('users')->where('id_user', $id)->get();
                //dd($login);
                session(['id'=>$login[0]->id_user, 'username'=>$login[0]->username, 'email'=>$login[0]->email, 
                'name'=>$login[0]->name]);
                return redirect('/user')->with('status', 'SUKSES');
            }
            return redirect('/user')->with('status', 'GAGAL');
        }
        else {
            return redirect('/user')->with('status', 'GAGAL');
        }
        
    }
}
