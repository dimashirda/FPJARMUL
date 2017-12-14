@extends('master')

@section('title')
 MyTube - Video
@endsection

@section('content')

	<div class="container" id="homecontent">
		<div class="row">
			<div class="col-md-8 video-container">
				<video controls class="video-player">
					<source src="http://10.151.34.157:3000/video/high/{{$video->_id}}" type="video/mp4">
				</video>
				<!-- <iframe src="http://10.151.34.157:3000/video/high/5a2ee7a01e3fd258dead8d1f" class="video-player" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> -->
				<div class="row">
					<div class="col-md-6">
						<h4>{{$video->title}}</h4>
						{{$video->description}}
						Posted By <a href="">
						@foreach($user as $dota) 
							@if($dota->id_user == $video->idUser) {{$dota->username}}
							@endif
						@endforeach </a> {{date('d F Y', strtotime($video->created_at))}}
					</div>
					<div class="col-md-3 col-md-offset-3">
						<a href="#"><i class="fa fa-2x fa-thumbs-o-up" aria-hidden="true"></i></a> Like &nbsp; &nbsp; &nbsp; 
						<a href="#"><i class="fa fa-2x fa-thumbs-o-down" aria-hidden="true"></i></a> Unlike
						{{$video->views}} Views
					</div>
				</div><hr>

				<!-- Comment Section https://www.youtube.com/embed/9mD-ZmWuFTQ-->

				<div class="container col-md-10 comment-container">
					<h4>Comment Section</h4><hr class="colorgraph">
					
					<form method="POST" action="{{ url('/video') }}">
						{{ csrf_field() }}
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
          <a href="#">
            <img class="img-thumbnail" src="https://www.parthpatel.net/wp-content/uploads/2017/04/Laravel-Tutorial-1024x576.jpg">
          </a><hr>
          <a href="#">
            <img class="img-thumbnail" src="https://i.ytimg.com/vi/yLNLPECROMA/maxresdefault.jpg">
          </a><hr>
          <a href="#">
            <img class="img-thumbnail" src="http://i.dailymail.co.uk/i/pix/2014/09/14/1410730427047_wps_10_epa04401083_Milan_s_Nigel.jpg">
          </a><hr>
          <a href="#">
            <img class="img-thumbnail" src="https://i.ytimg.com/vi/3kaUvGSLMew/hqdefault.jpg">
          </a><hr>
          <a href="#">
            <img class="img-thumbnail" src="https://i.ytimg.com/vi/GuWzvs8rtY0/maxresdefault.jpg">
          </a><hr>
          <a href="#">
            <img class="img-thumbnail" src="https://i.ytimg.com/vi/9mD-ZmWuFTQ/maxresdefault.jpg">
          </a><hr>
        </div>
      </div>
		</div>
	</div>
	

@endsection