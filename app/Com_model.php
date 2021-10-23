<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Com_model extends Model
{
    public $table="com_models";
    protected $fillable =  ['Name','Email','CollegeName','date','Stime','Etime','Password','Image'];
}
