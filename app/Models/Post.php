<?php

namespace App\Models;


class Post 
{
    public static function find($slug)
    {
        $path =resource_path('/posts/my-first-post.html');

        if(! file_exists($path)){
            dd('file is not found');
        }

        return cache()->remember("posts",5,fn()=>file_get_contents($path));
            
    }
}
