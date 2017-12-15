@extends('master')

@section('title')
	Njuutube - Home
@endsection
@section('content')

<section id="home">

	<div class="container" id="homecontent">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Trending
						<small>
							<h5 class="pull-right" id="h5">
								List of most view video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/trending')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<?php $count = 0; ?>
			@foreach($trend as $data)
				@if($count >= 4)
					@php break; @endphp
				@endif
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
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Musik
						<small>
							<h5 class="pull-right" id="h5">
								List of newest cool music video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/music')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<?php $count = 0; ?>
				@foreach($music as $data)
				@if($count >= 4)
				{
					@php break; @endphp
				}
				@endif
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
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Sport
						<small>
							<h5 class="pull-right" id="h5">
								List of newest cool music video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/sport')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<?php $count = 0; ?>
				@foreach($sport as $data)
				@if($count >= 4)
				{
					@php break; @endphp
				}
				@endif
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
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Education
						<small>
							<h5 class="pull-right" id="h5">
								List of newest cool music video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/education')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<?php $count = 0; ?>
				@foreach($education as $data)
				@if($count >= 4)
				{
					@php break; @endphp
				}
				@endif
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
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Games
						<small>
							<h5 class="pull-right" id="h5">
								List of newest cool music video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/games')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<?php $count = 0; ?>
				@foreach($games as $data)
				@if($count >= 4)
				{
					@php break; @endphp
				}
				@endif
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
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Entertainment
						<small>
							<h5 class="pull-right" id="h5">
								List of newest cool music video nowdays, follow the trend so you wont get left!!! Dont Forget to LIKE!!
								<a href="{{url('/entertainment')}}" id="viewall">View All</a> 
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<?php $count = 0; ?>
				@foreach($entertainment as $data)
				@if($count >= 4)
				{
					@php break; @endphp
				}
				@endif
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

	</div>

</section>


@endsection