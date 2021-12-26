<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table ='posts';
    protected $guarded=['id'];

    public function user(){
        return $this->belongsTo('App\Models\User','author_id','id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment','post_id','id');
    }
}
