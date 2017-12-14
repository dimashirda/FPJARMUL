<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;
use App\User;
use App\Comment;

class VideoController extends Controller
{
	public function index()
	{
		$client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
		try {
			$response = $client->get('http://10.151.34.157:3000/video');	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request ", $e);
		}
		$videos = json_decode($response->getBody());
		dd($videos);

	}

	public function watch($id, $quality)
	{
		$client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
		try {
			$response = $client->get('http://10.151.34.157:3000/video/'.$id);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request ", $e);
		}
		$data['video'] = json_decode($response->getBody())->data;

		$client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
		try {
			$response = $client->get('http://10.151.34.157:3000/video/view/'.$data['video']->category);	
		} catch (Exception $e) {
			throw new Exception("Error Processing Request ", $e);
		}
		$data['suggest'] = json_decode($response->getBody())->data->docs;
		$data['quality'] = $quality;
		$data['user'] = User::get();
		//dd($videos);
		return view('video', $data);
	}

	public function comment(Request $request)
  {
  	$comm = new comment;
  	$comm->content = $request->input('comment');
  	$comm->id_user = session('id');
  	$comm->id_video = $request->input('id');
  	$comm->save();

  	return back();
  }

  public function trending()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $trending = $client->get('http://10.151.34.157:3000/video/trending');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['trend'] = json_decode($trending->getBody())->data;
        $data['user'] = User::get();

        return view('trending', $data);
  }
  public function sport()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $sport = $client->get('http://10.151.34.157:3000/video/view/sport');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['sport'] = json_decode($sport->getBody())->data->docs;
        $data['user'] = User::get();

		return view('sport', $data);
		
  } 
   
  public function games()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $games = $client->get('http://10.151.34.157:3000/video/view/games');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['games'] = json_decode($games->getBody())->data->docs;
        $data['user'] = User::get();

        return view('games', $data);
  }

  public function entertainment()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $entertainment = $client->get('http://10.151.34.157:3000/video/view/entertainment');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['entertainment'] = json_decode($entertainment->getBody())->data->docs;
        $data['user'] = User::get();

        return view('entertainment', $data);
  }
  
  public function music()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $music = $client->get('http://10.151.34.157:3000/video/view/music');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['music'] = json_decode($music->getBody())->data->docs;
        $data['user'] = User::get();

        return view('music', $data);
  }

  public function education()
  {
  	  $client = new Client(['base_uri' => 'http://10.151.34.157:3000/video']);
        try {
            $education = $client->get('http://10.151.34.157:3000/video/view/education');
        } catch (Exception $e) {
            throw new Exception("Error Processing Request ", $e);
        }
        $data['education'] = json_decode($education->getBody())->data->docs;
        $data['user'] = User::get();

        return view('education', $data);
  }

  public function create()
  {
  	return view('video.create');
  }

  public function single()
  {
  	return view('video.single');
  }
}