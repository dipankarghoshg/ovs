<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body style="background-color: #ffc6a3;" >
    <style>
      
    .code{
    margin-top: 200px;
    width: 300px;
    height: 120px;
    border: 1px solid blue;
    border-radius: 9px;
    background-color: white;
    }
    input[type=text] {
    width: 200px;
    padding: 10px 20px;
    margin: 4px 0 10px 40px;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid red;
    }
    .sub{
    border-radius: 19px;
    width: 70px;
    height: 20px;
    margin-left: 40px;
    background-color: #85d6ff;
    font-size: 13px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    }
    .Sub:hover{
    background-color: #00ff84;
    box-shadow: 0 12px 16px 0 rgba(0,0,0.50),0 17px 50px 0 rgba(0,0,0.40);
    }
    </style>
    <center>
    <div class="code">
      <form action="<?php echo e(url('otp')); ?>">
        <label for="fname" >Verification Code</label>
        <input type="text" name="code" >
        <br><button class="sub">Submit</button>
      </form>
      </center>
    </div>
  </body>
</html><?php /**PATH C:\Laravel\ovs\resources\views/inputcode.blade.php ENDPATH**/ ?>