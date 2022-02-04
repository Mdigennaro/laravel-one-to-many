<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public static function slugCreate($title){

        $slug = Str::slug($title);
        $primo_slug = $slug;
        $post_uguale = Post::where('slug', $slug)->first();

        $contatore = 1;
        while($post_uguale){
            $slug = $primo_slug . '-' . $contatore;
            $contatore++;
            $post_uguale = Post::where('slug', $slug)->first();
        }

        return $slug;
    }

    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];
}
