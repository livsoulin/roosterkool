<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    //
    protected $table = 'photos';
    
    protected $upload = '/images/';
   
    protected $fillable = ['file','type'];
    
    
    
    // name table file from tbl_photo
    public function getFileAttribute($photo){
        
        return $this->upload.$photo;
        
    }
}
