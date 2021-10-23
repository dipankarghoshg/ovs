<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_model extends Model
{
    public $table="candidate_models";
    protected $keyType = 'string';
     protected $fillable =  ['Name','Email','CollegeId','Stream','Semno','Remarks','Post','Image'];
}
