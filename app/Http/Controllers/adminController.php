<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin_model;
use session;
use DB;

class adminController extends Controller
{
    public function index(){
    return view('adminLogin');
}
public function loginAdmin(Request $request)
    {     
        
        $udata=admin_model::where([
            ['Email',$request->Email],
            ['Password',$request->Password],
            
        ])->get();
      
        if ($udata=='[]') {
            return redirect()->Route('adminLogin')->with('error','Wrong Password or Userid!');
        }
      
        else {
             session(['Name'=>$udata[0]->Name]);
             session(['Email'=>$udata[0]->Email]);
             session(['Image'=>$udata[0]->Image]);
             //session(['Status'=>$udata[0]->Status]);

             
             return redirect()->route('admin');
        }
    }
    public function home($sid)
    {
        if(!request()->session()->has('Name'))
        {
            return redirect()->route('loginAdmin');
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
         DB::table('admin_models')
              ->where('id', $id)
              ->update(['Name'=>$request->input('Name')]);
         DB::table('admin_models')
              ->where('id', $id)
              ->update(['Email'=>$request->input('Email')]);

              
         
      
              
        return redirect('/views/admin.blade.php'); 
       flash('You have successfully edited your profile');
   
}
    
}
