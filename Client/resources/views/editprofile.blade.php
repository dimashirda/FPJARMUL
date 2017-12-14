@extends('master')

@section('content')

<section id="editprofile">
	<div class="container">
	    <h1>Edit Profile</h1>
	  	<hr>
		<div class="row">
		      <!-- left column -->
		    <div class="col-md-3">
		        <div class="text-center">
		          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
		        </div>
		    </div>
		      
		      <!-- edit form column -->
		    <div class="col-md-9 personal-info">
		        <h3>Personal info</h3>
		        
		        <form class="form-horizontal" role="form" action="{{url('/editprofile')}}" method="post">
		       	{{ csrf_field() }}
		          	<input type="hidden" value="iduser">
		          	<div class="form-group">
		            <label class="col-lg-3 control-label">First name:</label>
		            	<div class="col-lg-8">
		              		<input class="form-control" type="text" placeholder="insert new name" name="first">
		            	</div>
		         	 </div>
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Last name:</label>
		            <div class="col-lg-8">
		              <input class="form-control" type="text" placeholder="insert new last name" name="last">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Email:</label>
		            <div class="col-lg-8">
		              <input class="form-control" type="text" placeholder="insert new email" name="mail">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Username:</label>
		            <div class="col-md-8">
		              <input class="form-control" type="text" placeholder="insert new username" name="username">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Photo Profile:</label>
		            <div class="col-md-8">
		            	<input class="form-control" type="file" name="photo">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Old Password:</label>
		            <div class="col-md-8">
		              <input class="form-control" type="password" placeholder="insert old password" name="old">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">New Password:</label>
		            <div class="col-md-8">
		              <input class="form-control" type="password" placeholder="insert new password" name="new">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Confirm password:</label>
		            <div class="col-md-8">
		              <input class="form-control" type="password" placeholder="insert new password" name="confirm">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label"></label>
		            <div class="col-md-8">
		              <input class="btn btn-primary" value="Save Changes" type="submit">
		              <span></span>
		              <input class="btn btn-default" value="Cancel" type="reset">
		            </div>
		          </div>
		        </form>
		    </div>
		 </div>
	</div>
	<hr>
</section>

@endsection