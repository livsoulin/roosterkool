<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = ['photo_id','is_active'];
    
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
