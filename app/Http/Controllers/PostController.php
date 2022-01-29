<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
  public function index(Request $request) {
    $limit = $request->query("limit");
    $category = $request->query("category");

    if ($limit > 10) {
      $limit = 10;
    }

    $postsList = Post::with("category")
      ->with("tags")
      ->orderBy("created_at", "DESC");

    if ($category) {
      $postsList = $postsList->where("category_id", $category);
    }

    if ($limit) {
      $postsList = $postsList->limit($limit)->get();
    } else {
      $postsList = $postsList->paginate(2);
    }

    return response()->json($postsList);
  }

    function show($slug){

      $post = Post::where("slug", $slug)->with('category')->with('tags')->first();
    

      if (!$post) {
        throw new NotFoundHttpException("Post non trovato");
      }

      return response()->json($post); /* Torna un json di $post */

    }


}
