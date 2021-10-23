<?php
use Illuminate\Http\Request;
?>

<html>
<head>
    <title> Be a Candidate </title>
    <link rel="stylesheet" type="text/css" href="/Application/style1.css">   
</head>
    <body>

    <div class="login-box">
         <form name="f2" method="post" action="/stored" enctype="multipart/form-data" >
    <img src="/images/{{session('Image')}}" name="Image" class="avatar">
    <input type="text" name="Image" value="{{session('Image')}} " style="display: none;">

        <h1>Candidate!</h1>
           
                {{ csrf_field() }}
            <p>Name</p>
            <input type="text" name="Name" placeholder="Enter Your Name" value="<?php echo Session('Name')?>" readonly>
            <p>Email</p>
            <input type="text" name="Email"  value="<?php echo Session()->get(
            'Email')?>"readonly>
            <p>CollegeId</p>
            <input type="text" name="CollegeId" placeholder="Enter Your College Id" value="{{Session('CollegeId')}}"readonly>
            <p>Stream</p>
            <input type="text" name="Stream" placeholder="Enter Your Stream" value="<?php echo Session()->get('Stream')?>"readonly>
            <p>Semno</p>
            <input type="text" name="Semno" placeholder="Enter Your Semister">
            <p>Remarks</p>
            <input type="text" name="Remarks" placeholder="Enter Your Remarks" maxlength="255">
            <p>Post</p>
            <select name="Post" style="width:280px; display: inline-block;border:1px;box-sizing: border-box; color: #ad0a0a; background-color: #d6e1ff font-size:20px;">
            <option value="Post">Select Post</option>   
            <option value="AGS">AGS</option>
            <option value="CS">CS</option>
            <option value="ACS">ACS</option>
            
            </select>

        <input type="submit" name="submit" value="Submit">
    </form>

</div>

        <?php
        if(isset($_POST['submit'])){
         $Post = $_POST['Post'];  // Storing Selected Value In Variable
       // echo "You have selected :" .$selected_val;  // Displaying Selected Value
         }
         ?>       
       
        
    
    </body>
</html>