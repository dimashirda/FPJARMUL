@extends('master')

@section('title')
 MyTube - Video
@endsection

@section('content')

	<div class="container" id="homecontent">
		<div class="row">
			<div class="col-md-8 video-container">
				<!-- <video controls class="video-player">
					<source src="http://10.151.34.157:3000/video/{{$quality}}/{{$video->_id}}" type="video/mp4">
				</video> -->
				<iframe src="http://10.151.34.157:3000/video/{{$quality}}/{{$video->_id}}" class="video-player" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<div class="row">
					<div class="col-md-8">
						<h4>{{$video->title}}</h4>
						<label>Description : </label> {{$video->description}}<br><br>
						<strong>Posted By</strong> <a href="">
						@foreach($user as $dota) 
							@if($dota->id_user == $video->idUser) {{$dota->username}}
							@endif
						@endforeach </a> 
						{{date('d F Y', strtotime($video->date))}}
					</div>
					<div class="col-md-3 col-md-offset-1">
						<div class="form-group">
						  <select class="form-control" id="selectQuality" onchange="location = this.value;">
						  	<option value="" hidden>Quality</option>
						    <option value="high">High</option>
						    <option value="low">Low</option>
						  </select>
						</div>
						<a href="#"><i class="fa fa-2x fa-thumbs-o-up" aria-hidden="true"></i></a> Like &nbsp; &nbsp; &nbsp; 
						<a href="#"><i class="fa fa-2x fa-thumbs-o-down" aria-hidden="true"></i></a> Unlike
						<h4>{{$video->views}} Views</h4>
					</div>
				</div><hr>

				<!-- Comment Section https://www.youtube.com/embed/9mD-ZmWuFTQ-->

				<div class="container col-md-10 comment-container">
					<h4>Comment Section</h4><hr class="colorgraph">
					
					<form method="POST" action="{{ url('/video/comment') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$video->_id}}">
						<div class="row">
							<div class="form-group col-md-8">
								<input class="form-control" type="textbox" name="comment" placeholder="Add a comment...">
							</div>

							<button class="btn btn-lg btn-primary col-md-4" type="submit">Post</button>
						</div>
					</form>

				</div>
			</div>

			<!-- Side Widget -->
			<div class="col-md-4">
        <h4>Suggested</h4>
        <div class="card-body">
        	@foreach($suggest as $data)
        		@if($data->_id == $video->_id) <?php continue; ?> @endif
        		<div class="portfolio-item">
        			<a href="{{ url('/video/'.$data->_id).'/high' }}">
        				<img class="img-thumbnail" src="{{asset($data->thumbnailPath)}}" alt="">
        			<div class="row">
        				<div class="col-md-8">
			        			<h5>{{$data->title}}</h5>
			        		</a>
			      			<a href="{{ url('/user'.$data->idUser) }}">
			      				@foreach($user as $dota) @if($data->idUser == $dota->id_user) {{$dota->username}} @endif @endforeach
			      			</a> 
		      			</div>
		      			<div class="col-md-4"><br>{{$data->views}} Views</div>
        			</div>
        		</div><hr>
        	@endforeach
        </div>
      </div>
    </div>
	</div>
	

@endsection