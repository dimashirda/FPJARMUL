@extends('master')

@section('title')
	MyTube - Home
@endsection
@section('content')

<section id="home">

	<div class="container" id="homecontent">
			<?php $count = 0; ?>
			@foreach($vid as $data)
				@if($count % 4 == 0) 
					<div class="row"> 
				@endif
				<div class="col-md-3 portfolio-item">
					<a href="{{ url('/video/'.$data->_id.'/high') }}">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>{{$data->title}}</h4>
					</a>
					<a href="{{ url('/user'.$data->idUser) }}">
						<h6>@foreach($user as $dota) @if($data->idUser == $dota->id_user) {{$dota->username}} @endif @endforeach</h6>
					</a>
					<p>
						Total Views
					</p>
				</div>

				<?php $count++; ?>
				@if($count % 4 == 0) 
					</div> 
				@endif
				
			@endforeach
			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Musique
						<small>
							<h5 class="pull-right">
								Vous souhaitez avoir accès à toutes les mises à jour les plus récentes ? Abonnez-vous maintenant. 
								<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-youtube-play" aria-hidden="true"></i> S'abonner</a>
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
						 Musique
						<small>
							<h5 class="pull-right">
								Vous souhaitez avoir accès à toutes les mises à jour les plus récentes ? Abonnez-vous maintenant. 
								<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-youtube-play" aria-hidden="true"></i> S'abonner</a>
							</h5>
						</small>
					</h1>
				</div>
			</div>
			<!-- Projects Row -->
			<div class="row">
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
				<div class="col-md-3 portfolio-item">
					<a href="#">
						<img class="img-responsive" src="http://placehold.it/750x450" alt="">
						<h4>Vidéo de musique</h4>
					</a>
					<a href="#"><h6>Par musique de ouf</h6></a>
					<p>
						61 286 vues il y a 1 heure
					</p>
				</div>
			</div>
	</div>

</section>


@endsection