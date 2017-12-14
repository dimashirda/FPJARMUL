@extends('master')

@section('content')

<section id="register">


<div class="container" id="homecontent">
	<div class="container">
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 card">
		<form role="form" method="POST" action="{{ url('/register') }}">
			{{ csrf_field() }}
			<h2>Please Register <small>It's free and always will be.</small></h2>
			<hr class="colorgraph">
			<div class="form-group">
				<input type="text" name="name" id="display_name" class="form-control input-lg" placeholder="Name" tabindex="3">
			</div>
            <div class="form-group">
				<input type="text" name="username" id="display_name" class="form-control input-lg" placeholder="Username" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
			</div>
			<div class="form-group">
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
			</div>			
			<hr class="colorgraph">
				<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			</div>
		</form>
	</div>
</div>

</section>


@endsection