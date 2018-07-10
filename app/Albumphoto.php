<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albumphoto extends Model
{
    protected $upload = '/images/';
    protected $table = 'albumphotos';
   
    protected $fillable = ['file','type','album_id'];
    
    
    public function album(){
        return $this->belongsTo('App\Album');
    }
    
    
    // name table file from tbl_photo
    public function getFileAttribute($photo){
        
        return $this->upload.$photo;
        
    }
}
