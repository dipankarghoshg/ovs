<?php 
use Illuminate\Http\Request;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In From</title>
     <!-- Font Icon -->
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/style1.css">
</head>
<body>
      <!-- Sing in  Form -->
        <section class="sign-in">
            
                <div class="container-login100" style="background-image: url('public/img/bg.jpg'); ">
                    <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="/views/Regestraion.blade.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="post" class="register-form" id="login-form" action="/login/varify" >
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="Email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Email" id="Email" placeholder="Your UserName"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="Password" name="Password" id="Password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Login" >
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
    </div>

    <!-- JS -->
    <script src="vendor1/jquery/jquery.min.js"></script>
    <script src="/js/main1.js"></script>
</body>
</html>
</body>
</html><?php /**PATH C:\Laravel\Project_Major\resources\views/signin.blade.php ENDPATH**/ ?>