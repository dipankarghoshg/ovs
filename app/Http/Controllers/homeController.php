<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Http\Controllers\user_model;

use session;
use App\home;
class homeController extends Controller
{
	 public function index()
    {
        return view('home');
    }

     public function signin()
    {
        return view('signin');
    }
    public function Register()
    {
        return view('register');
    }

   // public function __construct()
   //  {
   //       $this->middleware('verified');
   //   }
   
}

