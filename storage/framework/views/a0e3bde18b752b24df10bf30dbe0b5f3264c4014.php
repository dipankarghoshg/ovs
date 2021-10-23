<?php 
use Illuminate\Http\Request;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regestration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/style1.css">
</head>

<body>

    <div class="main">
        <div class="container-login100" style="background-image: url('public/images/bg-01.jpg');">
            

        <!-- Sign up form -->

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register Here!</h2>
                        <form name="f1" method="get" class="register-form" id="register-form" action="<?php echo e(route('create')); ?>">

                            <div class="form-group">
                                <label for="Name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Name" id="Name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="Email"><i class="zmdi zmdi-email"></i></label>
                                <input type="Email" name="Email" id="Email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="CollegeId"><i class="fa fa-id-card"></i></label>
                                <input type="text" name="CollegeId" id="CollegeId" placeholder="Your CollegeId"/>
                            </div>
                            <div class="form-group">
                                <label for="Stream"><i class="fa fa-angle-right"></i></label>
                                <input type="text" name="Stream" id="Stream" placeholder="Your Stream"/>
                            </div>
                            <div class="form-group">
                                <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="Password" id="Password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="RetypePassword"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="RetypePassword" id="RetypePassword" placeholder="Repeat your password"/>
                            </div>
                            
                             <div class="form-group">
                               <label for="Image"><i class="fa fa-image"></i></label>
                                 <input type="file" class="form-control"
                                  id="Image"  name="Image" />
                             </div>
                             <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" >
                            </div>
                            
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/views/signin.blade.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
     
    </div>
        </section>

        
    <script src="vendor1/jquery/jquery.min.js"></script>
    <script src="/js/main1.js"></script>
</body>
</html><?php /**PATH C:\Laravel\Project_Major\resources\views/Regestraion.blade.php ENDPATH**/ ?>