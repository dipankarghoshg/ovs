<?php
use App\Http\Controllers\candidateController;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Commissioner-OVS </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/vendor1/vendor3/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="/vendor1/vendor3/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="/css/css3/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="/css/css3/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="/css/css3/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/img/img3/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap" rel="stylesheet">
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
            <!-- Navbar Header--><a href="/views/cmm.blade.php" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Voting</strong><strong>Commission</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item"><a href="#" class="search-open nav-link"></a></div>
            
            <div class="list-inline-item logout">                   <a id="logout" href='/Session/logout' class="nav-link">Logout </a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="/img/<?php echo e(Session('Image')); ?>" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?php
            echo session('Name');
            
            ?></h1>
            <p>Commissioner</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><!-- <span class="heading">Main</span> -->
        <ul class="list-unstyled">
          <li><a href="/views/cmm.blade.php"> <i class="icon-home"></i>Home </a></li>
          <li><a href="/views/tables.blade.php"> <i class="icon-grid"></i>Candidates </a></li>
          <li><a href="/views/usersTables.blade.php"> <i class="icon-grid"></i>Users </a></li>
          <li class="active"><a href="/views/charts.blade.php"> <i class="fa fa-bar-chart"></i>Results </a></li>
          
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
          <!-- Page Header-->
          <div class="page-header no-margin-bottom">
            <div class="container-fluid">
              <h2 class="h5 no-margin-bottom">Charts</h2>
            </div>
          </div>
          <!-- Breadcrumb-->
          <div class="container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/views/cmm.blade.php">Home</a></li>
              <li class="breadcrumb-item active">Charts            </li>
            </ul>
          </div>
          <section>
            <div class="container-fluid">
              <div class="row">
                
                
                <style>
                .btn-rs{
                border-radius: 19px;
                width: 200px;
                height: 40px;
                margin-left: 560px;
                margin-top: 200px;
                background-color: #85d6ff;
                font-size: 16px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                }
                .btn-rs:hover{
                background-color: #00ff84;
                box-shadow: 0 12px 16px 0 rgba(0,0,0.50),0 17px 50px 0 rgba(0,0,0.40);
                }
                table {
              border-collapse: collapse;
              width: 400px;

              }
              th, td {
              padding: 8px;
              text-align: left;
              border-bottom: 1px solid #ddd;
              }
              tr:hover {background-color:#a3ff75;}
                </style>
              <center>
                <table>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Post</th>
                    <th>Vote</th>
                  </tr>
                  <?php
                  $data= DB::table('Candidate_models')
                         ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
                         ->where('CStatus',1)
                         ->orderby('Post')->get();
                         
                  ?>
                  
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candiag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($candiag->Cid); ?></td>
                    <td><?php echo e($candiag->Name); ?></td>
                    <td><?php echo e($candiag->Post); ?></td>
                    <td><?php echo e($candiag->Vote); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </table>
                </center>
                <center>
                <form action="/result">
                  <button class="btn-rs" style="font-family: 'Open Sans', sans-serif; font-size: 20px;"> See Winners</button>
                  </center>
                  
                  
                </form>
              </div>
            </div>
          </section>
          <footer class="footer">
            <div class="footer__block block no-margin-bottom">
              <div class="container-fluid text-center">
                <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                <p class="no-margin-bottom">2020 &copy; Online Voting System<a target="_blank" href="/views/Home.blade.php">OVS</a>.</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
      <!-- JavaScript files-->
      <script src="/vendor1/vendor3//jquery/jquery.min.js"></script>
      <script src="/vendor1/vendor3/popper.js/umd/popper.min.js"> </script>
      <script src="/vendor1/vendor3/bootstrap/js/bootstrap.min.js"></script>
      <script src="/vendor1/vendor3/jquery.cookie/jquery.cookie.js"> </script>
      <script src="/vendor1/vendor3/chart.js/Chart.min.js"></script>
      <script src="/vendor1/vendor3/jquery-validation/jquery.validate.min.js"></script>
      <script src="/js/js3/charts-custom.js"></script>
      <script src="/js/js3/front.js"></script>
    </body>
  </html><?php /**PATH C:\Laravel\ovs\resources\views/charts.blade.php ENDPATH**/ ?>