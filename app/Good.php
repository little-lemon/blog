<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use SoftDeletes;
    //
    protected $table = 'good';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    protected $hidden = ['deleted_at'];

    public $casts = [
        'category_id' => 'array',
    ];
}
