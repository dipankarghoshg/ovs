<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home....

Route::resource('home','homeController');
Route::get('/views/signin.blade.php',function(){
	return view('signin');
})->name('login');
Route::get('/views/Regestraion.blade.php',function(){
	return view('Regestraion');
});
Route::post('/UpdateProfile/{Uid}','userController@UpdateProfile')->name('/UpdateProfile');
//home...
//User...
Route::resource('user','userController')->middleware('verified');
Route::get('/views/vote.blade.php',function(){
	return view('vote');
});
Route::get('/views/voteAGS.blade.php',function(){
	return view('voteAGS');
});
Route::get('/views/voteACS.blade.php',function(){
	return view('voteACS');
});
Route::get('/views/user.blade.php',function(){
	return view('user');
})->name('user');
Route::get('/views/application.blade.php',function(){
	return view('application');
});
Route::get('/views/voteApplication.blade.php',function(){
	return view('voteApplication');
});
Route::get('/views/Home.blade.php',function(){
	return view('Home');
});
Route::get('/views/UserProfile.blade.php',function(){
	return view('UserProfile');
})->name('UserProfile');
Route::get('/changeStatususers/{Uid}/{UStatus}','candidateController@changeStatususers');
// Route::get('/views/Nominations.blade.php',function(){
	// 	return view('Nominations');
// });
//home..




//candidate
Route::get('/views/vote.blade.php','candidateController@tab')->name('vote');
Route::get('/views/voteAGS.blade.php','candidateController@ags')->name('voteAGS');
Route::get('/views/voteACS.blade.php','candidateController@sc')->name('voteACS');
Route::get('/post','candidateController@postcs')->name('/post');
Route::get('/postacs','candidateController@postacs')->name('/postacs');
Route::get('/postags','candidateController@postags')->name('/postags');
Route::get('/views/Nominations.blade.php','candidateController@Nominations')->name('/Nominations');
Route::get('/views/tables.blade.php','candidateController@table')->name('/views/tables.blade.php');
Route::post('/stored','candidateController@stored')->name('/stored');
Route::get('/result','candidateController@result')->name('/result');
Route::get('/views/CandidateResults.blade.php',function(){
	return view('CandidateResults');
})->name('CandidateResults');
Route::get('/changeStatus/{Cid}/{CStatus}','candidateController@changeStatus');
Route::get('/views/Status.blade.php',function(){
	return view('Status');
});
Route::get('/views/usersTables.blade.php','candidateController@usersTable')->name('usersTables');
Route::get('/views/fullResults.blade.php',function(){
	return view('fullResults');
})->name('fullResults');
//candidate..



//Admin..
Route::resource('admin','adminController');
Route::get('/views/admin.blade.php',function(){
	return view('admin');
})->name('admin');
Route::post('/login/varify','userController@login');
Route::get('/signin',function(){
	return view('signin');
});
Route::post('create','userController@create')->name('create');
Route::get('/Session/logout',function(){
	Session::flush();
	return redirect('home');
});
Route::get('/views/adminTables.blade.php','comController@table')->name('seeCommissioner');
Route::get('/views/adminTablesUsers.blade.php','userController@usertable')->name('seeUsers');
Route::get('/views/adminTablesCandidates.blade.php','candidateController@candidatestable')->name('seeCandidate');
Route::get('/changeStatusadmin/{id}/{Status}','comController@changeStatusadmin');
Route::post('/loginAdmin/varify','adminController@loginAdmin');
Route::post('/adminUpdate/{id}','adminController@UpdateProfile')->name('/adminUpdate');
Route::get('/views/adminUpdate.blade.php',function(){
	return view('adminUpdate');
})->name('adminUpdate');

//admin...



//Cmm...
Route::resource('cmm','comController');
Route::get('/views/cmm.blade.php',function(){
	return view('cmm');
})->name('cmm');
Route::get('/views/charts.blade.php',function(){
	return view('charts');
})->name('charts');
Route::get('/views/cmmRegistration.blade.php',function(){
	return view('cmmRegistration');
});
Route::get('/views/loginCommissioner.blade.php',function(){
	return view('loginCommissioner');
})->name('loginCommissioner');
Route::post('/logincmm/varify','comController@logincmm');
Route::post('add','comController@add')->name('add');
Route::get('/views/Results.blade.php',function(){
	return view('Results');
})->name('Results');
Route::get('/views/terms&conditions.blade.php',function(){
	return view('terms&conditions');
})->name('terms&conditions');
Route::get('/views/inputcode.blade.php',function(){
	return view('inputcode');
})->name('inputcode');
Route::get('otp','userController@otp')->name('otp');
Route::get('Resend','userController@Resend')->name('Resend');
Route::get('/views/cmminputcode.blade.php',function(){
	return view('cmminputcode');
})->name('cmminputcode');
Route::get('cmmotp','comController@cmmotp')->name('cmmotp');
Route::post('/cmmUpdate/{id}','comController@UpdateProfile')->name('/cmmUpdate');
Route::get('/views/cmmUpdate.blade.php',function(){
	return view('cmmUpdate');
})->name('cmmUpdate');
