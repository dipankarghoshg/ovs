<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\message;

use App\Com_model;
use session;
use DB;
class comController extends Controller
{
    public function index(){
    return view('cmm');
}
    public function add(Request $request){
        // Form validation
        
        $this->validate($request,[
            'Name'              =>  'required',
            'Email'             =>  'required',
            'CollegeName'       =>  'required',
            'date'              =>  'required',
            'Password'			=> 'required',
            'ConfirmPassword'   => 'required_with:Password|same:Password|min:6',
            'Image'     => 
             'required|image|mimes:jpeg,png,jpg,gif|max:2048'
         ]);
        $image = $request->file('Image');
        $new_names =rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("img"),$new_names);
        $formdata=array( 
         'Image'=>$new_names,
         'Name'=>$request->input('Name'),
         'Email'=>$request->input('Email'),
         'CollegeName'=>$request->input('CollegeName'),
         'date'=>$request->input('date'),
         'Password'=>$request->input('Password'),
        );
        //dd($formdata);
         $name=$request->input('Name');
        $email=$request->input('Email');
        //dd($email);
        


     $udata=com_model::where('Email',$request->Email)->get();
     if($udata!='[]'){
        return redirect('/signin')->with('This Email is already registered!');
     }

     

     else{
    $to_email = $email;
       $subject = "verification Email For Commissioner panel By OVS";
       $otp=rand(100000,999999);
       $body = "Hi,".$name." This is Your verification code:-".$otp."Please verify your email to proceed furthur";
        $headers = "From: OVS";
        //dd($otp);
       com_model::create($formdata); 
            DB::table('com_models')
                ->where('Email',$email)
                ->update(['otp' => $otp]);


    if(mail($to_email, $subject, $body, $headers )){
        session(['otp'=>$otp]);
        session(['Name'=>$request->Name]);
        session(['Email'=>$request->Email]);
        session(['Password'=>$request->Password]);

    return redirect()->Route('loginCommissioner')->with('success','OTP mailed to '.$email);
    
    }
    else{
        return redirect('/views/cmmRegistration.blade.php')->with('error','Try again Latter');
    }
            
}
       

        

     
    }
    public function logincmm(Request $request)
    {     
       
        $udata=com_model::where([
            ['Email',$request->Email],
            ['Password',$request->Password],
            
        ])->get();
      
        if ($udata=='[]') {
            return redirect()->Route('loginCommissioner')->with('error','Wrong Password or Userid!');
        }
      
        else {
             session(['Name'=>$udata[0]->Name]);
             session(['Email'=>$udata[0]->Email]);
             session(['Image'=>$udata[0]->Image]);
             //session(['Status'=>$udata[0]->Status]);
                $log=DB::table('com_models')
                ->where('Email',session('Email'))->get();
            if ($log[0]->Status==1) {
                return redirect()->route('cmm');           
                 }
                 else{
                     return redirect()->route('loginCommissioner')->with('error','Your profile has not been verified by the Admin Yet! Please try After some time');
                 }
             
        }
             
            
    }
    public function home($sid)
    {
        if(!request()->session()->has('Name'))
        {
            return redirect()->route('loginCommissioner');
        }
    }
    public function table(){
    $data=com_model::all();
    return view('adminTables',['data'=>$data]);
}
    public function changeStatusadmin($id, $Status){
        
         DB::table('com_models')
              ->where('id', $id)
              ->update(['Status' => $Status]);
        
        // $this->data[$Status] = 1;
         return redirect('/views/adminTables.blade.php');
    }


    public function cmmotp(Request $request){
   // dd($request->input('code'));
    $code=$request->input('code');
    //dd($code);
    $veri=DB::table('com_models')
        ->where('Email',session('Email'))
        ->get();
    if ($veri[0]->otp==$code) {
        DB::table('com_models')
        ->where('Email',session('Email'))
        ->update(['hasverified' => 1]);

     $to_email = session('Email');
     
       $subject = "Congratulations";
      
       $body = "Hi,".session('Name')." Your request for beeing a Commissioner Has been successfully Approved with OVS. Welcome to OVS";
        $headers = "From: OVS";
    mail($to_email, $subject, $body, $headers );
        
       
        // session(['Email'=>$request->Email]);
        // session(['Password'=>$request->Password]);


        return redirect('/views/cmm.blade.php')->with('Your Email Has been verifed');
    }
    else{
        return redirect('/views/cmminputcode.blade.php')->with('Error try again');
    }

}
public function UpdateProfile(Request $request,$id){


 
         
     //     $formdata=array( 
     //    'Image'=>$new_name,
     //    'Name'=>$request->input('Name'),
     //    'Email'=>$request->input('Email'),
     // 'CollegeId'=>$request->input('CollegeId'),
     //      'Stream'=>$request->input('Stream'),
     //     );
       //dd($request->input('Name'));
         DB::table('com_models')
              ->where('Id', $id)
              ->update(['Name'=>$request->input('Name')]);
       DB::table('com_models')
              ->where('Id', $id)
              ->update(['Email'=>$request->input('Email')]);
           
              
        return redirect('/views/cmm.blade.php'); 
       flash('You have successfully edited your profile');
   
}
}
