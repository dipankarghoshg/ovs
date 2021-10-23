<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_model extends Model 
{
   public $table="User_model";
   protected $keyType = 'string';
    protected $fillable =  ['Name','Email','CollegeId','Stream','Password','RetypePassword','Image','CollegeName','activationcode'];
}
