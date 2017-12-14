@extends('master')

@section('content')

	<div class="container" id="homecontent">
		<div class="row">
			<div class="col-md-8 video-container">
				<iframe src="https://www.youtube.com/embed/9mD-ZmWuFTQ" class="video-player" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
				<div class="row">
					<div class="col-md-3">
						<h4>Hotto Doggu</h4>
					</div>
					<div class="col-md-3 col-md-offset-6">
						<a href="#"><i class="fa fa-2x fa-thumbs-o-up" aria-hidden="true"></i></a> Like &nbsp; &nbsp; &nbsp; 
						<a href="#"><i class="fa fa-2x fa-thumbs-o-down" aria-hidden="true"></i></a> Unlike
					</div>
				</div><hr>

				<!-- Comment Section -->

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