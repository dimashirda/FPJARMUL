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

  public function create()
  {
  	return view('video.create');
  }

  public function single()
  {
  	return view('video.single');
  }
}