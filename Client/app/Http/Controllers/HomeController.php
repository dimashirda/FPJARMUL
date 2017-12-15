<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;
use App\User;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            //$response = $client->get('http://10.151.34.157:3000/video');
            $trending = $client->get('http://10.151.34.157:3000/video/trending');
            $music = $client->get('http://10.151.34.157:3000/video/view/music');
            $entertainment = $client->get('http://10.151.34.157:3000/video/view/entertainment');
            $sport = $client->get('http://10.151.34.157:3000/video/view/sport');
            $games = $client->get('http://10.151.34.157:3000/video/view/games');
            $education = $client->get('http://10.151.34.157:3000/video/view/education');
            
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        // /dd($semoga);
        //dd($response);
        //$data['vid'] = json_decode($response->getBody())->data->docs;
        $data['trend'] = json_decode($trending->getBody())->data;
        $data['entertainment'] = json_decode($entertainment->getBody())->data->docs;
        $data['education'] = json_decode($education->getBody())->data->docs;
        $data['sport'] = json_decode($sport->getBody())->data->docs;
        $data['music'] = json_decode($music->getBody())->data->docs;
        $data['games'] = json_decode($games->getBody())->data->docs;
        $data['user'] = User::get();
        //dd($data['sport']);
        
    	return view('home', $data);
    }
    public function search(Request $request)
    {
        $key = $request->keyword;
        $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $response = $client->get('http://10.151.34.157:3000/video/search?keyword='.$key);
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }

        $data['user'] = User::get();
        $data['result'] = json_decode($response->getBody());
        dd($data['result']);

        return view('search', $data);
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
