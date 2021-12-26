<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table ='comments';
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo('App\Models\User','author_id','id');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post','post_id','id');
    }

}
