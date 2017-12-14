<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/flatly/bootstrap.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
      <a class="navbar-brand point" id="menu-toggle"><i id="menu-toggle" class="fa fa-bars" aria-hidden="true"></i></a>
      <a class="navbar-brand" href="{{url('/')}}">MyTube</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/trending')}}">Trending</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Entertainment</a>
                  <a class="dropdown-item" href="#">Music</a>
                  <a class="dropdown-item" href="#">Sport</a>
                  <a class="dropdown-item" href="#">Games</a>
                  <a class="dropdown-item" href="#">Education</a>
                  <a class="dropdown-item" href="#">News</a>
                  <a class="dropdown-item" href="#">Lifehack</a>
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-2 col-md-6" method="POST" action="{{ url('/search') }}">
              {{ csrf_field() }}
              <input class="form-control mr-sm-5" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-default" type="submit" id="searchhome"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              @if(Session::has('id'))
              <li class="dropdown nav-item">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown">Hi, {{session('username')}}
                <!-- <span class="caret"></span> --></a>
                <ul class="dropdown-menu">
                  <a href="{{url('/profile')}}" class="dropdown-item">Profile</a>
                  <a href="{{url('/logout')}}" class="dropdown-item">Logout</a>
                </ul>
              </li>
              @else
                <li class="mr-sm-5 nav-item"><a href="{{url('/register')}}">Register</a></li>
                <li class="mr-sm-3"><a href="{{url('/login')}}">Login</a></li>
              @endif
            </ul>
          </div>
      <div id="wrapper" class="toggled">
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li>
              <a class="activer" href="#"><i class="fa fa-home" aria-hidden="true"></i>  MyTube</a>
            </li>
            <hr/>
            <h5 class="" id="text1">
              Popular Videos
            </h5>
            <li>
              <a href="#"><img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">  Music</a>
            </li>
            <li>
              <a href="#"><img src="//i.ytimg.com/i/Egdi0XIXXZ-qJOFPf4JSKw/1.jpg" class="avatar-xs">  Sport</a>
            </li>
            <li>
              <a href="#"><img src="//i.ytimg.com/i/OpNcN46UbXVtpKMrmU4Abg/1.jpg" class="avatar-xs">  Games</a>
            </li>
            <li>
              <a href="#"><img src="//i.ytimg.com/i/lgRkhTL3_hImCAmdLfDE4g/1.jpg" class="avatar-xs">  Entertainment</a>
            </li>
            <!-- <li>
              <a href="#"><img src="https://yt3.ggpht.com/-qJOENyJEaMM/AAAAAAAAAAI/AAAAAAAAAAA/HSq_6hPBiVI/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" class="avatar-xs">  Émissions télévisées</a>
            </li> -->
            <li>
              <a href="#"><img src="//i.ytimg.com/i/YfdidRxbB8Qhf0Nx7ioOYw/1.jpg" class="avatar-xs">  News</a>
            </li>
            <!-- <li>
              <a href="#"><img src="//i.ytimg.com/i/4R8DWoMoI7CAwX8_LjQHig/1.jpg" class="avatar-xs">  En direct</a>
            </li>
            <li>
              <a href="#"><img src="//i.ytimg.com/i/zuqhhs6NWbgTzMuM09WKDQ/1.jpg" class="avatar-xs">  Vidéo à 360 degrés</a>
            </li> -->
            <hr/>
            <!-- <p class="container text-left">
                Connectez-vous maintenant pour
              <br/>
               consulter vos chaînes et les
              <br/>
               recommandations.
              <br/>
              <br/>
              <a href="#" class="btn btn-info btn-xs">Connexion</a>
            </p> -->
          </ul>
        </div>
      </div>
  </nav>

      @yield('content')

      <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-confirmation">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              Pesan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-simple" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>
</body>
<!-- <body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand point" id="menu-toggle"><i id="menu-toggle" class="fa fa-bars" aria-hidden="true"></i></a>
      <a class="navbar-brand" href="#"> Youtube                            </a>
    </div>
    <div class="container-fluid">
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Accueil</a></li>
          <li class=""><a href="#">Tendances</a></li>
        </ul>
        <div class="col-sm-3 col-md-3">
          <form class="navbar-form" role="search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Rechercher" name="q">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <ul class="navbar-form navbar-right">
          <a href="#" class="btn btn-default">Mettre en ligne</a>
          <a href="#" class="btn btn-info">Connexion</a>
        </ul>
      </div>
    </div>
    <div id="wrapper">
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li>
            <a class="activer" href="#"><i class="fa fa-home" aria-hidden="true"></i>  Accueil</a>
          </li>
          <li>
            <a class="" href="#"><i class="fa fa-fire" aria-hidden="true"></i>  Tendances</a>
          </li>
          <hr/>
          <h5 class="text-left text-danger">
            LE MEILLEUR DE YOUTUBE
          </h5>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/-9-kyTW8ZkZNDHQJ6FgpwQ/1.jpg" class="avatar-xs">  Musique</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/Egdi0XIXXZ-qJOFPf4JSKw/1.jpg" class="avatar-xs">  Sport</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/OpNcN46UbXVtpKMrmU4Abg/1.jpg" class="avatar-xs">  Jeux vidéo et autres</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/lgRkhTL3_hImCAmdLfDE4g/1.jpg" class="avatar-xs">  Films</a>
          </li>
          <li>
            <a href="#"><img src="https://yt3.ggpht.com/-qJOENyJEaMM/AAAAAAAAAAI/AAAAAAAAAAA/HSq_6hPBiVI/s88-c-k-no-mo-rj-c0xffffff/photo.jpg" class="avatar-xs">  Émissions télévisées</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/YfdidRxbB8Qhf0Nx7ioOYw/1.jpg" class="avatar-xs">  Actualités</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/4R8DWoMoI7CAwX8_LjQHig/1.jpg" class="avatar-xs">  En direct</a>
          </li>
          <li>
            <a href="#"><img src="//i.ytimg.com/i/zuqhhs6NWbgTzMuM09WKDQ/1.jpg" class="avatar-xs">  Vidéo à 360 degrés</a>
          </li>
          <hr/>
          <p class="container text-left">
              Connectez-vous maintenant pour
            <br/>
             consulter vos chaînes et les
            <br/>
             recommandations.
            <br/>
            <br/>
            <a href="#" class="btn btn-info btn-xs">Connexion</a>
          </p>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
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
</body> -->
<script type="text/javascript">
  $(function() {    
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
});
</script>
</html>