<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    function index() {

        $postInterni = Post::with('category')->with('tags')->orderBY('updated_at')->paginate(2);
        
        return $postInterni;
      }

    function show($slug){

      $post = Post::where("slug", $slug)->with('category')->with('tags')->first();
    

      if (!$post) {
        throw new NotFoundHttpException("Post non trovato");
      }

      return response()->json($post); /* Torna un json di $post */

    }


}
