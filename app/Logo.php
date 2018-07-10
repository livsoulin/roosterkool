<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = 'logos';
    protected $fillable = ['photo_id','is_active'];
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
