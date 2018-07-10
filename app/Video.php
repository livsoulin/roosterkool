<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    protected $table = 'videos';
    protected $fillable = ['title', 'category_id', 'body', 'is_active'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    
    function getBodyAttribute($url) {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }

}
