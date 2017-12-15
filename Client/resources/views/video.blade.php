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
						<strong>Posted By</strong> <a href="{{ url('/profile/'.$video->idUser) }}">
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
						<input type="hidden" name="like_check" value="@if(isset($like[0])) ? $like[0]->status : null @endif" >
						@if(isset($like[0]))
							@if($like[0]->status == 0)
								<i onclick="sendLike(1);" class="fa fa-2x fa-thumbs-o-up" aria-hidden="true" id="tombollike"></i> Like &nbsp; &nbsp; &nbsp; 
								<i onclick="sendLike(-1);" class="fa fa-2x fa-thumbs-down disabled" aria-hidden="true" id="dislike"></i> Dislike
							@elseif($like[0]->status == 1)
								<i onclick="sendLike(1);"class="fa fa-2x fa-thumbs-up disabled" aria-hidden="true" id="tombollike"></i> Like &nbsp; &nbsp; &nbsp; 
								<i onclick="sendLike(-1);" class="fa fa-2x fa-thumbs-o-down" aria-hidden="true" id="dislike"></i></a> Dislike
							@else
								<i onclick="sendLike(1);" class="fa fa-2x fa-thumbs-o-up" aria-hidden="true" id="tombollike"></i></a> Like &nbsp; &nbsp; &nbsp; 
								<i onclick="sendLike(-1);" class="fa fa-2x fa-thumbs-o-down" aria-hidden="true" id="dislike"></i></a> Dislike
							@endif
						@else
							<i onclick="sendLike(1);" class="fa fa-2x fa-thumbs-o-up" aria-hidden="true" id="tombollike"></i></a> Like &nbsp; &nbsp; &nbsp; 
							<i onclick="sendLike(-1);" class="fa fa-2x fa-thumbs-o-down" aria-hidden="true" id="dislike"></i></a> Dislike
						@endif
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
						@foreach($comment as $comm)
						<div class="container">
							<div class="row">
								<div class="col-md-1" style="text-align: center;">
									<img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" class="img-icon">
								</div>
							
								<div class="col-md-8">
									<a href="">@foreach($user as $dota) 
										@if($dota->id_user == $comm->id_user) {{$dota->username}}
										@endif
									@endforeach </a><br>
									{{$comm->content}}
									<h6>On {{date('d F Y', strtotime($comm->created_at))}}</h6>
								</div>
							</div>
						</div><hr>
						@endforeach
					</form>

				</div>
			</div>

			<!-- Side Widget -->
			<div class="col-md-4">
        <h4>Suggested</h4>
        <div class="card-body">
        	<?php $count = 0; ?>
        	@foreach($suggest as $data)
				@if($count == 6) 
					<?php break; ?>
        		@else <?php $count++; ?>
        		@endif
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
	<script type="text/javascript">
		function sendLike(type){
			var targetUrl;
			if(type == -1)
				targetUrl = '{{url('/dislike/'.$video->_id.'?user='.session('id'))}}';	
			else
				targetUrl = '{{url('/like/'.$video->_id.'?user='.session('id'))}}';
			$.ajax({
				url: targetUrl,
				dataType: 'json',
				type: 'GET',
				success: function(res){
					console.log("Masuk!");
					// var message = json_decode(res);
					console.log(res);
					if(type == -1)
						{
							$('#tombollike').removeClass('fa-thumbs-up disabled').addClass('fa-thumbs-o-up');
							$('#dislike').removeClass('fa-thumbs-o-down').addClass('fa-thumbs-down disabled');
							
						}
					else
					{
						$('#dislike').removeClass('fa-thumbs-down disabled').addClass('fa-thumbs-o-down');
						$('#tombollike').removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up disabled');
					}
						
				},
				error: function(err){
					console.log("error njing");
					console.log(err.message);
				}
			});
		}
	</script>
@endsection