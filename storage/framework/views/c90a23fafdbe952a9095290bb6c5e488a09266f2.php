<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ovs- Cmm Registration </title>
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
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <?php if(count($errors)>0): ?>
            <div class="alert alert-danger">
              Upload validation error<br>
            </div>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert block">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Welcome!</h1>
                  </div>
                  <p>If your college is looking for assitence in your College Elections then Go Ahead! you are in a right place<br><br>
                    NB:- We recomend you to please read our <a href="/views/terms&conditions.blade.php">terms and conditions </a>carefully!
                  </p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form class="text-left form-validate" name="f31" method="post" enctype="multipart/form-data" class="register-form" id="register-form" action="<?php echo e(url('add')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group-material">
                      <input id="Name" type="text" name="Name" required data-msg="Please enter your Name" class="input-material">
                      <label for="Name" class="label-material">Name</label>
                    </div>
                    <div class="form-group-material">
                      <input id="Email" type="email" name="Email" required data-msg="Please enter a valid email address" class="input-material">
                      <label for="Email" class="label-material">Email Address      </label>
                    </div>
                    <div class="form-group-material">
                      <input id="CollegeName" type="text" name="CollegeName" required data-msg="Please enter a valid College Name" class="input-material">
                      <label for="CollegeName" class="label-material">College Name      </label>
                    </div>
                    <div class="form-group-material">
                      <input id="date" type="date" name="date" required data-msg="Please enter a valid Date" class="input-material"style="opacity:29%;">
                      <label for="date" class="label-material" >Voting Date      </label>
                    </div>
                    
                    <div class="form-group-material">
                      <input id="Password" type="password" name="Password" required data-msg="Please enter your password" class="input-material" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                      <label for="Password" class="label-material">Password        </label>
                    </div>
                    <div class="form-group-material">
                      <input id="Password" type="password" name="ConfirmPassword" required data-msg="Please reenter your password" class="input-material" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                      <label for="Password" class="label-material">Confirm Password        </label>
                    </div>
                    <div class="form-group-material">
                      <input id="Image" type="file" name="Image"  class="input-material">
                      <label for="Image" class="label-material">  </label>
                    </div>
                    
                    <div class="form-group terms-conditions text-center">
                      <input id="register-agree" name="registerAgree" type="checkbox" required value="1" data-msg="Your agreement is required" class="checkbox-template">
                      <label for="register-agree">I agree with the  <a href="/views/terms&conditions.blade.php">terms and policy </a> </label>
                    </div>
                    <div class="form-group text-center">
                      <input id="register" type="submit" value="Register" class="btn btn-primary">
                    </div>
                    </form><small>Already have an account? </small><a href="/views/loginCommissioner.blade.php" class="signup">Login</a>
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
  </html><?php /**PATH C:\Laravel\ovs\resources\views/cmmRegistration.blade.php ENDPATH**/ ?>