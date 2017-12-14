@extends('master')

@section('content')

<section id="upload">

	<div class="container">
	    <h1>Edit Profile</h1>
	  	<hr>
		<div class="row">
		      <!-- left column -->
		      
		      <!-- edit form column -->
		    <div class="col-md-9 personal-info">
		        <h3>Upload Video</h3>
		        
		        <form class="form-horizontal" role="form">
		          	<div class="form-group">
		            <label class="col-lg-3 control-label">Judul</label>
		            	<div class="col-lg-8">
		              		<input class="form-control" value="Jane" type="text">
		            	</div>
		         	 </div>
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Kategori</label>
		            <div class="col-lg-8">
		              <input class="form-control" value="Bishop" type="text">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-lg-3 control-label">Deskripsi</label>
		            <div class="col-lg-8">
		              <input class="form-control" value="janesemail@gmail.com" type="text">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label">Video</label>
		            <div class="col-md-8">
		              <input class="form-control" type="file">
		            </div>
		          </div>
		          <div class="form-group">
		            <label class="col-md-3 control-label"></label>
		            <div class="col-md-8">
		              <input class="btn btn-primary" value="Save Changes" type="button">
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