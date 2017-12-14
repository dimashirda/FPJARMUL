<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;

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

	public function watch()
	{
		return view('video');
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