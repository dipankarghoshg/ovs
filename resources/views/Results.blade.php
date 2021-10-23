<?php
use Illuminate\Http\Request;
use App\Com_model;
use App\Candidate_models;
use App\User_model;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor1/vendor2/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor1/vendor2/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="/css/css2/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/css2/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/css2/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/img2/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="/views/admin.blade.php" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Voting</strong><strong>Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">V</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item"><a href="#" class="search-open nav-link"></a></div>
            <div class="list-inline-item logout">
              <a id="logout" href='/Session/logout' class="nav-link">Logout </a></div>
            </div>
          </div>
        </nav>
      </header>
      <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="/img/{{Session('Image')}}" style="height: 50px; " alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h5"><?php
              echo session('Name');
              
              ?></h1>
              <p>Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li><a href="/views/cmm.blade.php"> <i class="icon-home"></i>Home </a></li>
            <li class="active"><a href="/views/tables.blade.php"> <i class="icon-grid"></i>Tables </a></li>
            <li><a href="/views/charts.blade.php"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            
          </nav>
          <!-- Sidebar Navigation end-->
          <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
              <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Results</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/views/cmm.blade.php">Home</a></li>
                <li class="breadcrumb-item active">Results            </li>
              </ul>
            </div>
            <section class="no-padding-top">
              <div class="container-fluid">
                <div class="row">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <style>
                  .card {
                  float: left;
                  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                  transition: 0.3s;
                  width: 20%;
                  margin:20px;
                  padding: 5px;
                  }
                  .card:hover {
                  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
                  }
                  .container::after{
                  padding: 2px 16px;
                  
                  }
                  </style>
                  <?php
                  $data=com_model::all();
                  $WCS=DB::table('Candidate_models')
                  ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
                  ->where('Candidate_models.CollegeId',$data[0]->WinnerCS)->get();
                  ?>
                  <form name="Results">
                    @foreach ($WCS as $candidate)
                    <div class="card">
                      <img src="/images/{{$candidate->Image}}" alt="Avatar" style="width:100%">
                      <div class="container">
                        <h4><b>{{$candidate->Name}}</b></h4>
                        <p>POST :- {{$candidate->Post}}</p>
                        <p>has won With{{$candidate->Vote}} votes.</p>
                      </div>
                    </div>
                    @endforeach
                    <?php
                    $data=com_model::all();
                    $WACS=DB::table('Candidate_models')
                    ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
                    ->where('Candidate_models.CollegeId',$data[0]->WinnerACS)->get();
                    ?>
                    @foreach ($WACS as $candidate)
                    <div class="card">
                      <img src="/images/{{$candidate->Image}}" alt="Avatar" style="width:100%">
                      <div class="container">
                        <h4><b>{{$candidate->Name}}</b></h4>
                        <p>POST :- {{$candidate->Post}}</p>
                        <p>has won With{{$candidate->Vote}} votes.</p>
                      </div>
                    </div>
                    @endforeach
                    <?php
                    $data=com_model::all();
                    $WAGS=DB::table('Candidate_models')
                    ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
                    ->where('Candidate_models.CollegeId',$data[0]->WinnerAGS)->get();
                    ?>
                    @foreach ($WAGS as $candidate)
                    <div class="card">
                      <img src="/images/{{$candidate->Image}}" alt="Avatar" style="width:100%">
                      <div class="container">
                        <h4><b>{{$candidate->Name}}</b></h4>
                        <p>POST :- {{$candidate->Post}}</p>
                        <p>has won With{{$candidate->Vote}} votes.</p>
                      </div>
                    </div>
                    @endforeach
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p class="no-margin-bottom">2020 &copy; Online Voting System <a target="_blank" href="/views/Home.blade.php">OVS</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="/vendor1/vendor2/jquery/jquery.min.js"></script>
    <script src="/vendor1/vendor2/popper.js/umd/popper.min.js"> </script>
    <script src="/vendor1/vendor2/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor1/vendor2/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor1/vendor2/chart.js/Chart.min.js"></script>
    <script src="/vendor1/vendor2/jquery-validation/jquery.validate.min.js"></script>
    <script src="/js/js2/front.js"></script>
  </body>
</html>