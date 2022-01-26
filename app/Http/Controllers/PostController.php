<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {

        $postInterni = Post::with('category')->with('tags')->orderBY('updated_at')->paginate(2);
        

      
 
       
        
        return $postInterni;
      }
}
