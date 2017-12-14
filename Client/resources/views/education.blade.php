@extends('master')

@section('content')

<section id="sport">
	<div class="container" id="hometrend">
			<?php $count = 0; ?>
			@foreach($education as $data)
				@if($count % 4 == 0) 
					<div class="row"> 
				@endif
				<div class="col-md-3 portfolio-item">
					<a href="{{ url('/video/'.$data->_id.'/high') }}">
						<img class="img-responsive" src="{{asset($data->thumbnailPath)}}" alt="">
						<h4>{{$data->title}}</h4>
					</a>
					<a href="{{ url('/profile/'.$data->idUser) }}">
						<h6>@foreach($user as $dota) @if($data->idUser == $dota->id_user) {{$dota->username}} @endif @endforeach</h6>
					</a>
					<p>
						Total Views {{$data->views}}
					</p>
				</div>

				<?php $count++; ?>
				@if($count % 4 == 0) 
					</div> 
				@endif
				
			@endforeach
	</div>
	
</section>

@endsection