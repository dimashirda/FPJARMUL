<!DOCTYPE html>
<html>
<head>
	<title>Upload Video</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Njuutube</a>
          <a href="{{url('/income/new')}}" style="margin-left: 10px">Add Income</a>
          <a href="{{url('/expense/new')}}" style="margin-left: 20px">Add Expense</a>
        </div>
        Hi, {{session('username')}}
      </div>
    </nav>
	<div class="container">
		<div class="col-md-8" id="successMsg" style="display: none;">
			Success Uploading Video!!!
		</div>
		<div class="col-md-8" id="uploadForm">
		
	<form id="createForm" action="http://10.151.34.157:3000/video" method="POST" enctype="multipart/form-data">
		{{csrf_field()}}
	  <div class="form-group">
	    <label for="exampleInputEmail1">Video Title</label>
	    <input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter Transaction Name">
	  </div>
	  <div class="form-group">
	    <label for="exampleFormControlSelect1">Video Description</label>
	  	<textarea type="text" name="description" class="form-control"></textarea>
  		</div>
			<div class="form-group">
	    <label for="exampleFormControlSelect1">Video Description</label>
	  	<select name="category" class="form-control">
				<option value="music">Music</option>
				<option value="sport">Sport</option>
				<option value="games">Games</option>
				<option value="education">Education</option>
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
</body>
</html>