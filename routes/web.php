<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

// Route for Front page and posts and my posts

Route::get('/posts/{post}',function($slug){
    
    
    $path = __DIR__ . '/../resources/posts/my-first-post.html';

    if(! file_exists($path)){
        ddd('file is not found');
    }

    //Creating cache for the file

    $post=cache()->remember("posts",5,function() use($path){
        var_dump('file_get_content');
        return file_get_contents($path);
    });

    // // shorter version
    // $post=cache()->remember("posts",5,fn()=>file_get_contents($path));

    // $post=$slug;

    $post=file_get_contents($path);

    return view('post',[

        'post'=>$post
    ]);
})->where('post','[A-z_\-]+');

