<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverBottom extends Model
{
    protected $table = 'cover_bottoms';
    protected $fillable = ['photo_id','is_active'];
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    
}
