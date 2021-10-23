<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate_model;
use App\User_model;
use session;
use DB;
class candidateController extends Controller
{
    public function stored(Request $request){
        
        //$image = $request->file('Image');
        // $new_name =rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path("candImages"),$new_name);
         $formdata=array( 
         
        
         'Email'=>$request->input('Email'),
         'CollegeId'=>$request->input('CollegeId'),
         
         'Remarks'=>$request->input('Remarks'),
         'Semno'=>$request->input('Semno'),
         'Post'=>$request->input('Post'),
        );
     
        candidate_model::create($formdata);
         DB::table('User_model')
              ->where('CollegeId',$request->input('CollegeId'))
              ->update(['isCandidate'=>1]);
        
       return redirect('/views/user.blade.php')->with('success','Regestered succesfully');
       
    }
    public function table(){
      $data=DB::table('Candidate_models')
                            ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
                            
                            ->get();
      
   //=Candidate_model::all();
    return view('tables',['data'=>$data]);
}
    public function changeStatus($Cid, $CStatus){
        
         DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where('Candidate_models.Cid', $Cid)
              ->update(['Candidate_models.CStatus'=>$CStatus]);
             // ->update(['CStatus' => $CStatus]);
       //        $c=Candidate_model::all();
       // dd($c);
        // $this->data[$Status] = 1;
         return redirect('/views/tables.blade.php');
    }
    public function usersTable(){
      $data=User_model::all();
    return view('usersTables',['data'=>$data]);
    }
    public function changeStatususers($Uid, $UStatus){
        
         DB::table('User_model')
              ->where('Uid', $Uid)
              ->update(['UStatus' => $UStatus]);
        
        // $this->data[$Status] = 1;
         return redirect('/views/usersTables.blade.php');
    }

     public function tab(){
        $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where([['Post','CS'],['CStatus',1]])
              
              ->orderBy('Cid')
              ->get();
              
              return view('vote',['data'=>$data]);
 } 
  
 public function sc(){
        $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where([['Post','ACS'],['CStatus',1]])
              
              ->orderBy('Cid')
              ->get();
              
              return view('voteACS',['data'=>$data]);
 }    
 public function ags(){
        $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where([['Post','AGS'],['CStatus',1]])
              
              ->orderBy('Cid')
              ->get();
              
              return view('voteAGS',['data'=>$data]);
 }
  public function postcs(Request $request){
        //dd($request->CS);
    $vt= DB::table('User_model')
              ->where('Email',session('Email'))
              ->update(['Votecnt' => 1]);

         $data= DB::table('Candidate_models')
            ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where('Cid',$request->CS)
              ->increment('Vote',1);

       

        return redirect('/views/voteACS.blade.php')->with('You Have Voted For CS Position Succesfully');

}
 
 public function postags(Request $request){
        //dd($request->CS);
  $vt= DB::table('User_model')
              ->where('Email',session('Email'))
              ->update(['Votecnt' => 1]);

         $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where('Cid',$request->AGS)
              ->increment('Vote',1);

           
        return redirect('/views/user.blade.php')->with('You Have VOted For AGS Position Succesfully');
}
public function postacs(Request $request){
        //dd($request->CS);
         $vt= DB::table('User_model')
              ->where('Email',session('Email'))
              ->update(['Votecnt' => 1]);

          $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where('Cid',$request->ACS)

              ->increment('Vote',1);

        return redirect()->route('voteAGS')->with('You Have VOted For ACS Position Succesfully');
}

public function result(){
         $votecs= DB::table('Candidate_models')
                ->where('Post','CS')
                ->max('Vote');
              
          $vo= DB::table('Candidate_models')
                ->where([['Vote',$votecs],['Post','CS']])
                ->select('CollegeId')->get();
               // dd($votecsnm[0]->Name);
              
              DB::table('com_models')
                  ->update(['WinnerCS' => $vo[0]->CollegeId]); 
          
           
           $voteacs= DB::table('Candidate_models')
                
                ->where('Post','ACS')
                ->max('Vote');
                //dd($voteacs);
            $voteacsnm= DB::table('Candidate_models')
                ->where([['Vote',$voteacs],['Post','ACS']])
                ->select('CollegeId')->get(); 
             //dd($voteacsnm[0]->Name);
               DB::table('com_models')
                  ->update(['WinnerACS' => $voteacsnm[0]->CollegeId]); 
             
           
            
            $voteags= DB::table('Candidate_models')
                ->select('Name')
                ->where('Post','AGS')
                ->max('Vote');
              $voteagsnm= DB::table('Candidate_models')
                ->where([['Vote',$voteags],['Post','AGS']])
                ->select('CollegeId')->get();    
                //dd($voteagsnm[1]->Name);
                
                 DB::table('com_models')
                    ->update(['WinnerAGS' => $voteagsnm[0]->CollegeId]); 

                    DB::table('com_models')
                    ->update(['ResultCheck'=>1]);  

                    return view('results');
             
    }
    public function Nominations(){
       $data= DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->where('CStatus',1)
              
              ->orderBy('Post')
              ->get();

       return view('Nominations',['data'=>$data]);
    }
     public function candidatestable(){
    $data=DB::table('Candidate_models')
              ->join('User_model','User_model.CollegeId','=','Candidate_models.CollegeId')
              ->get();
    return view('adminTablesCandidates',['data'=>$data]);
}
}

