<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
     protected $table = 'albums';
    protected $fillable = ['name','category_id'];
    
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function albumphoto(){
        return $this->hasMany('App\Albumphoto');
    }
}
