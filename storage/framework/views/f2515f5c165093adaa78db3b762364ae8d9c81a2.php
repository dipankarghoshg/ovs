<?php
use Illuminate\Http\Request;
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="Ela Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
  <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
  <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ae09fe9906.js" crossorigin="anonymous"></script>
  
  <style>
  #weatherWidget .currentDesc {
  color: #ffffff!important;
  }
  .traffic-chart {
  min-height: 335px;
  }
  #flotPie1  {
  height: 150px;
  }
  #flotPie1 td {
  padding:3px;
  }
  #flotPie1 table {
  top: 20px!important;
  right: -10px!important;
  }
  .chart-container {
  display: table;
  min-width: 270px ;
  text-align: left;
  padding-top: 10px;
  padding-bottom: 10px;
  }
  #flotLine5  {
  height: 105px;
  }
  #flotBarChart {
  height: 150px;
  }
  #cellPaiChart{
  height: 160px;
  }
  .dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  width: 150px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  }
  .dropdown {
  position: relative;
  display: inline-block;
  }
  .dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  }
  .dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  }
  .dropdown-content a:hover {background-color: #f1f1f1}
  .dropdown:hover .dropdown-content {
  display: block;
  }
  .dropdown:hover .dropbtn {
  background-color: #3e8e41;
  }
  .btn-full{
  border-radius: 15px;
  border:none;
  background-color: #6e0101;
  width: 100px;
  margin-top: 10px;
  font-size: 19px;
  }
  .btn-full:hover{
  background-color: #2e001f;
  }
  </style>
</head>
<body>
  <?php if($message = Session::get('error')): ?>
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
  </div>
  <?php endif; ?>
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="/views/user.blade.php"><i class=" menu-icon fas fa-columns"></i>Dashboard </a>
          </li>
          <li class="menu-title">Be a Candidate</li><!-- /.menu-title -->
          <?php
          use App\User_model;
          use App\Com_model;
          use App\Candidate_model;
          $hv=DB::table('User_model')
          ->where('Email',Session('Email'))->get();
          $is=Com_model::all();
          if ($hv[0]->hasverified==1) {
          
          if ($is[0]->CollegeName== session('CollegeName')) {
          
          
          //$us=User_model::all();
          $can=Candidate_model::all();
          $us=DB::table('User_model')
          ->where('Email',session('Email'))->get();
          if ($us[0]->isCandidate==1) {
          ?>
          <a href="/views/Status.blade.php" > <i class="fas fa-question"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check Status</a>
          <?php
          }
          else{
          ?>
          <a href="/views/application.blade.php" > <i class="menu-icon fa fa-cogs"></i>Apply</a>
          <?php
          }
          
          }
          }
          else{
          ?>
          <a href="#" > <i class="menu-icon fa fa-cogs"></i>Apply</a>
          <?php
          }
          ?>
          <li class="menu-title">Be a part of future</li>
          <?php
          $vot= DB::table('User_model')
          ->select('Votecnt')
          ->where('Email',session('Email'))->get();
          
          if($vot[0]->Votecnt==1)  {
          ?>
          <li class="menu-item-has-children dropdown">
            
            <div class="dropdown">
              <button class="dropbtn" ><i class="menu-icon fa fa-tasks"></i> &nbsp;Give Vote</button>
              <div class="dropdown-content" >
                <select disabled="disabled">
                  <a href="/views/vote.blade.php">Post CS</a>
                  <a href="/views/voteAGS.blade.php">Post AGS</a>
                  <a href="/views/voteACS.blade.php">Post ACS</a>
                </select>
              </div>
            </div>
            <?php
            }
            else
            {
            ?>
            <li class="menu-item-has-children dropdown">
              
              <div class="dropdown">
                <button class="dropbtn"><i class="menu-icon fa fa-tasks"></i> &nbsp;Give Vote</button>
                <div class="dropdown-content" >
                  
                  <a href="/views/vote.blade.php">Post CS</a>
                  <a href="/views/voteAGS.blade.php">Post AGS</a>
                  <a href="/views/voteACS.blade.php">Post ACS</a>
                </div>
              </div>
              <?php
              }
              
              ?>
              
            </ul>
            </div><!-- /.navbar-collapse -->
          </nav>
        </aside>
        <!-- /#left-panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
          <!-- Header-->
          <header id="header" class="header">
            <div class="top-left">
              <div class="navbar-header">
                <a href="/views/Home.blade.php"> Online Voting System </a>
                
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
              </div>
            </div>
            <div class="top-right">
              <div class="header-menu">
                <div class="header-left">
                  <button class="search-trigger"><i class="fa fa-search"></i></button>
                  <div class="form-inline">
                    <form class="search-form">
                      <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                      <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                  </div>
                  
                  <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="user-avatar rounded-circle" src="/images/<?php echo e(Session('Image')); ?>"  alt="User Avatar">
                    </a>
                    <div class="user-menu dropdown-menu">
                      <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>
                      <a class="nav-link" href="#"> <?php
                        echo session('Name');
                        
                      ?></a>
                      
                      
                      
                      <a class="nav-link" href="/Session/logout"><i class="fa fa-power -off"></i>Logout</a>
                    </div>
                  </div>
                </div>
              </div>
            </header>
            <!-- /#header -->
            <!--/.Content -->
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
            <form name="nomi" action="/Nominations">
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="card">
                <img src="/images/<?php echo e($candidate->Image); ?>" alt="Avatar" style="width:100%">
                <div class="container">
                  <h4><b><?php echo e($candidate->Name); ?></b></h4>
                  <p><?php echo e($candidate->Post); ?></p>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
            <!-- /.content -->
            
            <!-- <div class="clearfix">  -->
            <!-- Footer -->
            <!--  <footer class="site-footer">
              <div class="footer-inner bg-white">
                <div class="row">
                  <div class="col-sm-6">
                    Copyright &copy; 2020 OVS
                  </div>
                  <div class="col-sm-6 text-right">
                    Designed by <a href="">OVS</a>
                  </div>
                </div>
              </div>
            </div>
          </footer> -->
          
          <!-- /.site-footer -->
          <!--   </div> -->
          <!-- /#right-panel -->
          <!-- Scripts -->
          <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
          <script src="assets/js/main.js"></script>
          <!--  Chart js -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
          <!--Chartist Chart-->
          <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
          <script src="assets/js/init/weather-init.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
          <script src="assets/js/init/fullcalendar-init.js"></script>
          <!--Local Stuff-->
          <script type="text/javascript">
          var TRange = null;
          function findString(str) {
          if (parseInt(navigator.appVersion) < 4) return;
          var strFound;
          if (window.find) {
          // CODE FOR BROWSERS THAT SUPPORT window.find
          strFound = self.find(str);
          if (strFound && self.getSelection && !self.getSelection().anchorNode) {
          strFound = self.find(str)
          }
          if (!strFound) {
          strFound = self.find(str, 0, 1)
          while (self.find(str, 0, 1)) continue
          }
          } else if (navigator.appName.indexOf("Microsoft") != -1) {
          // EXPLORER-SPECIFIC CODE
          if (TRange != null) {
          TRange.collapse(false)
          strFound = TRange.findText(str)
          if (strFound) TRange.select()
          }
          if (TRange == null || strFound == 0) {
          TRange = self.document.body.createTextRange()
          strFound = TRange.findText(str)
          if (strFound) TRange.select()
          }
          } else if (navigator.appName == "Opera") {
          alert("Opera browsers not supported, sorry...")
          return;
          }
          if (!strFound) alert("String '" + str + "' not found!")
          return;
          };
          document.getElementById('f1').onsubmit = function() {
          findString(this.t1.value);
          return false;
          };
          </script>
          <!-- Bootstrap core JavaScript-->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- Core plugin JavaScript-->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
          <!-- Custom scripts for all pages-->
          <script src="js/sb-admin-2.min.js"></script>
          <!-- Page level plugins -->
          <script src="vendor/chart.js/Chart.min.js"></script>
          <!-- Page level custom scripts -->
          <script src="js/demo/chart-area-demo.js"></script>
          <script src="js/demo/chart-pie-demo.js"></script>
          <!--=========================================script============================================-->
        </body>
      </html><?php /**PATH C:\Laravel\ovs\resources\views/Nominations.blade.php ENDPATH**/ ?>