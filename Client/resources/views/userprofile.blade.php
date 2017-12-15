@extends('master')

<link rel="stylesheet" type="text/css" href="{{('css/profile.css')}}">
@section('content')
<section id="profile">
  
  <div class="container">
  <div class="row">
        <div class="col-md-12 text-center ">
          <div class="panel panel-default" id="panel">
            <div class="userprofile social ">
              <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="userpicimg"> </div>
              <h3 class="username">Lucky Sans</h3>
            </div>
            <div class="col-md-12 border-top border-bottom">
              <a class="btn btn-primary followbtn" href="{{('/user/upload')}}">Upload Videos</a>
              <a class="btn btn-primary followbtn" href="{{('/editprofile')}}">Edit Profile</a>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="container" >
          <!-- Projects Row -->
          <div class="container" id="hometrend">
              <?php $count = 0; ?>
              @foreach($result as $data)
                @if($count % 4 == 0) 
                  <div class="row"> 
                @endif
                @if($count == 0)
                  <div class="col-lg-12">
                    <h1 class="page-header">
                      My Videos
                    </h1>
                  </div>
                @endif
                <div class="col-md-3 portfolio-item">
                  <a href="{{ url('/video/'.$data->_id.'/high') }}">
                    <img class="img-responsive" src="{{asset($data->thumbnailPath)}}" alt="">
                    <h4>{{$data->title}}</h4>
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
  </div>
  </div>
</section>

@endsection