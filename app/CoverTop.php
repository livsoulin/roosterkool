<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverTop extends Model
{
    protected $table = 'cover_tops';
    protected $fillable = ['photo_id','is_active'];
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    
    
}
