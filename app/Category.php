<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //use SoftDeletes;
    //
    protected $table = 'category';

    //protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    //protected $hidden = ['deleted_at'];

    public function goods()
    {
        return $this->hasMany('App\Good','cid','id');
    }

}
