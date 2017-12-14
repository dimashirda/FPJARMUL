<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB, Input;
use App\User;

class LoginController extends Controller
{
    public function view()
    {
        return view('login');
    }

    public function loggedin(Request $req)
    {
        //dd($req);
        $username = $req->input('username');
        $password = $req->input('password');
        $rp = md5($password);
        $login = DB::table('users')->where(['username'=>$username, 'password'=>$rp])->get();
        if (count($login)>0) 
        {
            //dd($login);
            session(['id'=>$login[0]->id_user, 'username'=>$login[0]->username, 'email'=>$login[0]->email, 
                'name'=>$login[0]->name]);
            return redirect('/');
        }
        else
        {
            return redirect('/')->with('status', 'Login gagal, cek kembali username dan password anda!!!');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function registered(Request $req)
    {   
        $name = $req->input('name');
        $username = $req->input('username');
        $password = $req->input('password');
        $email = $req->input('email');
        $login = DB::table('users')->where("username", $username)->get();
        if(count($login)) 
        {
            return redirect('/')->with('status', 'Register gagal, username sudah ada!!!');
        }
        else
        {   
            // $key_size = 32;
            // $enc_key = openssl_random_pseudo_bytes($key_size, $strong);
            // //dd($enc_key);
            // $iv_size = 32;
            // $iv = openssl_random_pseudo_bytes($iv_size, $strong);

            $user = new User;
            $user->name = $name;
            $user->username = $username;
            $user->password = md5($password);
            $user->email = $email;
            $user->save();
            return redirect('/')->with('status', 'Register berhasil!!!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

}
