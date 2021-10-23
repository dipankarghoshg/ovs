<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome! Admin</title>
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
  </head>
  <body>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Welcome!</h1>
                  </div>
                  <p>cds</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" action="/loginAdmin/varify">
                    <div class="form-group">
                      <input id="Email" type="Email" name="Email" required data-msg="Please enter your username" class="input-material">
                      <label for="Email" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="Password" type="password" name="Password" required data-msg="Please enter your password" class="input-material">
                      <label for="Password" class="label-material">Password</label>
                    </div>
                    <button class="btn btn-primary" id="login" value="Login" style="width: 60px; height: 35px;">Login</button>
                    {{csrf_field()}}
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                    </form><a href="#" class="forgot-pass">Forgot Password?</a><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- JavaScript files-->
      <script src="/vendor1/vendor3/jquery/jquery.min.js"></script>
      <script src="/vendor1/vendor3/popper.js/umd/popper.min.js"> </script>
      <script src="/vendor1/vendor3/bootstrap/js/bootstrap.min.js"></script>
      <script src="/vendor1/vendor3/jquery.cookie/jquery.cookie.js"> </script>
      <script src="/vendor1/vendor3/chart.js/Chart.min.js"></script>
      <script src="/vendor1/vendor3/jquery-validation/jquery.validate.min.js"></script>
      <script src="/js/js3/front.js"></script>
    </body>
  </html>