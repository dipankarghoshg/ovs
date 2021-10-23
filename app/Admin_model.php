<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_model extends Model
{
	public $table="admin_models";
    protected $fillable =  ['Name','Email','Password','Image'];
}
