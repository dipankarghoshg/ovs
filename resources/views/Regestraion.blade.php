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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script type="text/javascript" src="C:\Laravel\ovs\jquery-3.5.1.min.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ae09fe9906.js" crossorigin="anonymous">
        </script>
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
                                
                                @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    Upload validation error<br>
                                </div>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                @endif
                                @if($message = Session::get('success'))
                                <div class="alert alert-success alert block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <form name="f1" method="post" enctype="multipart/form-data" class="register-form" id="register-form" action="{{url('create')}}">
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
                                        <label for="CollegeName"><i class="fa fa-id-card"></i></label>
                                        <input type="text" name="CollegeName" id="CollegeName" placeholder="Your College Name"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Stream"><i class="fa fa-stream"></i></label>
                                        <input type="text" name="Stream" id="Stream" placeholder="Your Stream"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password"><i class="zmdi zmdi-lock"></i></label>
                                        <input type="password" name="Password" id="Password" placeholder="Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="RetypePassword"><i class="zmdi zmdi-lock-outline"></i></label>
                                        <input type="password" name="RetypePassword" id="RetypePassword" placeholder="Repeat your password"/>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="Image"></label>
                                        <input type="file" class="form-control"
                                        id="Image"  name="Image" style="height: 30px;" />
                                    </div>
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        
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
        
        </script>
    </body>
</html>