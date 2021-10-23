<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\user;

use App\User_model;
use DB;
use session;
class userController extends Controller 
{

    public function index()
    {
        return view('user');
    }
    public function Give_vote()
    {
    	return view('vote');
    }
     public function Apply()
    {
    	return view('voteApplication');
    }
    //  public function __construct()
    // {
    //      $this->middleware(['auth','verified']);
    //  }
     
    public function create(Request $request){
        // Form validation
        
        $this->validate($request,[
            'Name'              =>  'required',
            'Email'             =>  'required',
            'CollegeId'         =>  'required',
            'CollegeName'       =>  'required',
            'Stream'            =>  'required',
            'Password'          =>  'required',
            'RetypePassword'    => 'required_with:Password|same:Password|min:8',
            'Image'     => 
             'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);
        $image = $request->file('Image');
        $new_name =rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        $formdata=array( 
         'Image'=>$new_name,
         'Name'=>$request->input('Name'),
         'Email'=>$request->input('Email'),
         'CollegeId'=>$request->input('CollegeId'),
         'CollegeName'=>$request->input('CollegeName'),
         'Stream'=>$request->input('Stream'),
         'Password'=>$request->input('Password'),
         'RetypePassword'=>$request->input('RetypePassword'),
         
         
        );
        $name=$request->input('Name');
        $email=$request->input('Email');
        //dd($email);
        


     $udata=User_model::where('Email',$request->Email)->get();
     if($udata!='[]'){
        return redirect('/signin')->with('This Email is already registered!');
     }

     

     else{
        $to_email = $email;
       $subject = "verification of Email By OVS";
       $otp=rand(100000,999999);
       $body = "Hi,".$name." This is Your verification code:-".$otp."Please verify your email to proceed furthur";
        $headers = "From: OVS";
        //dd($otp);
        User_model::create($formdata); 
            DB::table('User_model')
                ->where('Email',$email)
                ->update(['otp' => $otp]);


    if(mail($to_email, $subject, $body, $headers )){
        session(['otp'=>$otp]);
        session(['Name'=>$request->Name]);
        session(['Email'=>$request->Email]);
        session(['Password'=>$request->Password]);

    return redirect('/views/signin.blade.php')->with('success','OTP mailed to '.$email);
    
    }
    else{
        return redirect('/views/Regestraion.blade.php')->with('error','Try again Latter');
    }
            
}
       


   }     
    

  //protected $redirectTo = 'user';


     public function login(Request $request)
    {     

        $udata=User_model::where([
            ['Email',$request->Email],
            ['Password',$request->Password],
            

        ])->get();
    
       
        if ($udata=='[]') {
            return redirect('/signin')->with('error','Wrong Password or Userid!');
        }
        else {
             session(['Name'=>$udata[0]->Name]);
             session(['Email'=>$udata[0]->Email]);
             session(['Image'=>$udata[0]->Image]);

             session(['CollegeId'=>$udata[0]->CollegeId]);
             session(['Stream'=>$udata[0]->Stream]);
             session(['CollegeName'=>$udata[0]->CollegeName]);
            $ul=DB::table('User_model')
                ->where('Email',session('Email'))->get();
                //dd($log[1]->Status);
            if ($ul[0]->UStatus==1) {
                return redirect()->route('user');           
                 }
                 else{
                     return redirect('/signin')->with('error','Your profile has not been verified by the Commissioner Yet! Please try After some time');
                 }
             
        }
    }
    public function home($sid)
    {
        if(!request()->session()->has('Name'))
        {
            return redirect()->route('login');
        }
    }

public function table(){
    $data=com_model::all();
    return view('adminTables',['data'=>$data]);
}
 public function UpdateProfile(Request $request,$Uid){


 
         
     //     $formdata=array( 
     //    'Image'=>$new_name,
     //    'Name'=>$request->input('Name'),
     //    'Email'=>$request->input('Email'),
     // 'CollegeId'=>$request->input('CollegeId'),
     //      'Stream'=>$request->input('Stream'),
     //     );
       //dd($request->input('Name'));
         DB::table('User_model')
              ->where('id', $id)
              ->update(['Name'=>$request->input('Name')]);
       DB::table('User_model')
              ->where('id', $id)
              ->update(['Stream'=>$request->input('Stream')]);
              
        return redirect('/views/admin.blade.php'); 
       flash('You have successfully edited your profile');
   
}



public function otp(Request $request){
   // dd($request->input('code'));
    $code=$request->input('code');
    //dd($code);
    $veri=DB::table('User_model')
        ->where('Email',session('Email'))
        ->get();
    if ($veri[0]->otp==$code) {
        DB::table('User_model')
        ->where('Email',session('Email'))
        ->update(['hasverified' => 1]);

     $to_email = session('Email');
     
       $subject = "Congratulations";
      
       $body = "Hi,".session('Name')." Your Account Has been successfully registered with OVS.";
        $headers = "From: OVS";
    mail($to_email, $subject, $body, $headers );
        
       
        // session(['Email'=>$request->Email]);
        // session(['Password'=>$request->Password]);


        return redirect('/views/user.blade.php')->with('Your Email Has been verifed');
    }
    else{
        return redirect('/views/inputcode.blade.php')->with('Error try again');
    }
    

}
 public function usertable(){
    $data=User_model::all();
    return view('adminTablesUsers',['data'=>$data]);
}



}
