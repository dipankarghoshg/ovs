<?php
use Illuminate\Http\Request;
?>
<html>
    <head>
        <title> Update Profile</title>
        <style >
        body{
        margin: 0;
        padding: 0;
        /*background-image: url(C:\Laravel\Major Project\User\Application\Screenshot.jpg);*/
        background: rgba(0, 0, 0, .1);
        background-position: center;
        font-family: sans-serif;
        }
        .login-box{
        width: 340px;
        height: 510px;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%,-50%);
        box-sizing: border-box;
        padding: 70px 30px;
        border-radius: 5px;
        }
        .avatar{
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        top: -50px;
        left: calc(50% - 50px);
        }
        h1{
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 22px;
        }
        .login-box p{
        margin: 0;
        padding: 0;
        font-weight: bold;
        }
        .login-box input{
        width: 100%;
        margin-bottom: 20px;
        }
        .login-box input[type="text"], input[type="password"]
        {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
        }
        .login-box input[type="submit"]
        {
        border: none;
        outline: none;
        height: 40px;
        margin-top:23px;
        background: #1c8adb;
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        }
        .login-box input[type="submit"]:hover
        {
        cursor: pointer;
        background: #39dc79;
        color: #000;
        }
        .login-box a{
        text-decoration: none;
        font-size: 14px;
        color: #fff;
        }
        .login-box a:hover
        {
        color: #39dc79;
        }
        </style>
    </head>
    <body>

        <?php
        use App\admin_model;
        $data=DB::table('admin_models')
        ->where('Email',session('Email'))->get();
        ?>
        <div class="login-box">
            <form name="f2" method="post" action='/adminUpdate/<?php echo e($data[0]->id); ?>' enctype="multipart/form-data" >
                <img src="<?php echo e(Session('Image')); ?>" name="Image" class="avatar">
                <input type="text" name="Image" value="<?php echo e(session('Image')); ?> " style="display: none;">
                <h1>Update Your Profile!</h1>
                
                <?php echo e(csrf_field()); ?>

                <p>Name</p>
                <input type="text" name="Name" placeholder="Enter Your Name" value="<?php echo Session('Name')?>" >
                <p>Email</p>
                <input type="text" name="Email"  value="<?php echo Session()->get(
                'Email')?>" readonly>
               <!-- <p>Image</p>
                <input type="file" name="image" >
                 -->
                <input type="submit" name="submit" value="Update Profile">
                <a href="/views/admin.blade.php"><input type="submit" name="submit" value="Back"></a>
            </form>
             
        </div>
        
        
        
        
    </body>
</html><?php /**PATH C:\Laravel\ovs\resources\views/adminUpdate.blade.php ENDPATH**/ ?>