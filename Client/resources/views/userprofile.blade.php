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
              <button class="btn btn-primary followbtn">Upload Videos</button>
              <button class="btn btn-primary followbtn">Edit Profile</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="container" >
          <!-- Projects Row -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                <img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">
                 Popular Uploads
              </h1>
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
                 All Videos
                </small>
              </h1>
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
        </div>
  </div>
  </div>
</section>

@endsection