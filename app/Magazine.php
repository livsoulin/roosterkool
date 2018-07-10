<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $table = 'magazines';
    protected $fillable = ['title','photo_id','file_download','is_active','count','user_id'];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photo(){
        return $this->belongsTo('App\photo');
    }
    
}
