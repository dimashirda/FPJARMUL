<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $response = $client->get('http://10.151.34.157:3000/video');   
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['vid'] = json_decode($response->getBody())->data->docs;

        $data['user'] = User::get();
        //dd($data);
    	return view('home', $data);
    }
    public function login()
    {
    	return view('login');
    }
    public function register()
    {
    	return view('register');
    }
}
