<?php
use Illuminate\Http\Request;
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
            <div class="avatar"><img src="<?php echo e(Session('Image')); ?>" style="height: 50px; " alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h5"><?php
              echo session('Name');
              
              ?></h1>
              <p>Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li><a href="/views/admin.blade.php"> <i class="icon-home"></i>Home </a></li>
            <li class="active"><a href="/views/adminTables.blade.php"> <i class="icon-grid"></i>Tables </a></li>
             <li ><a href="/views/adminTablesUsers.blade.php"> <i class="icon-grid"></i>Users </a></li>
             <li ><a href="/views/adminTablesCandidates.blade.php"> <i class="icon-grid"></i>Candidates </a></li>

            
          </nav>
          <!-- Sidebar Navigation end-->
          <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
              <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Tables</h2>
              </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/views/admin.blade.php">Home</a></li>
                <li class="breadcrumb-item active">Tables            </li>
              </ul>
            </div>
            <section class="no-padding-top">
              <div class="container-fluid">
                <div class="row">
                  
                  <div class="col-lg-6" style="width: 100%;">
                    <div class="block margin-bottom-sm" style="width:1000px;">
                      <div class="title"><strong>Commissioner Table</strong></div>
                      <style>
                      table {
                      border-collapse: collapse;
                      width: 100%;
                      }
                      th, td {
                      padding: 8px;
                      text-align: left;
                      border-bottom: 1px solid #ddd;
                      }
                      tr:hover {background-color:#910025;}
                      </style>
                      
                      <table class="table" >
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CollegeName</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th colspan="2" >CHANGE STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <th scope="row"><?php echo e($com->Id); ?></th>
                            <td><?php echo e($com->Name); ?></td>
                            <td><?php echo e($com->Email); ?></td>
                            <td><?php echo e($com->CollegeName); ?></td>
                            <td><?php echo e($com->date); ?></td>
                            
                            <td>
                              <?php
                              switch ($com->Status) {
                              case "0":
                              echo "Pending";
                              break;
                              case "1":
                              echo "Verified";
                              break;
                              case "-1":
                              echo "Decliend";
                              break;
                              default:
                              echo "error";
                              }?>
                              <td><a style="color:#78ff85; padding-left: 20px" href='/changeStatusadmin/<?php echo e($com->Id); ?>/1'>Allow</a></td>
                              <td><a style="color:#ff1f1f; padding-right: 20px"  href='/changeStatusadmin/<?php echo e($com->Id); ?>/-1'>Deny</a></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                          </tbody>
                        </table>
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
      </html><?php /**PATH C:\Laravel\ovs\resources\views/adminTables.blade.php ENDPATH**/ ?>