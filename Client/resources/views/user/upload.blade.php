@extends('master')

@section('content')
	<div class="container" id="upload">
		<div class="col-md-8" id="successMsg" style="display: none;">
			Success Uploading Video!!!
		</div>
		<div class="col-md-8" id="uploadForm">
		
	<form id="createForm" action="http://10.151.34.157:3000/video" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Video Title</label>
	    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Insert Video Tittle">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Video Description</label>
	  	<textarea type="text" name="description" class="form-control"></textarea>
  		</div>
			<div class="form-group">
	    <label for="exampleFormControlSelect1">Category</label>
	  	<select name="category">
				<option value="music">Music</option>
				<option value="sport">Sport</option>
				<option value="games">Games</option>
				<option value="education">Education</option>
				<option value="entertainment">Entertainment</option>
			</select>
  		</div>
<input type="hidden" name="user" value="{{session('id')}}">
	<div class="form-group">
    	<label>Video</label><br>
        <input type="file" id="inputImg" name="videoUpload" class="form-control" placeholder="Enter Expense Bill or note or etc...">
        <img id="preview"  class="img-responsive img-rounded" >
    </div>
  	<input type="hidden" name="item_num" value="1" id="itemNum">
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
	</div>
	</div>

@endsection