<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index() {
        $postInterni = Post::with('category')->get();
        

        $postsList = [
          [
            "userId" => 1,
            "id" => 1 . "i",
            "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            "body" => "quia et suscipit
    suscipit recusandae consequuntur expedita et cum
    reprehenderit molestiae ut ut quas totam
    nostrum rerum est autem sunt rem eveniet architecto"
          ],
          [
            "userId" => 1,
            "id" => 2  . "i",
            "title" => "qui est esse",
            "body" => "est rerum tempore vitae
    sequi sint nihil reprehenderit dolor beatae ea dolores neque
    fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis
    qui aperiam non debitis possimus qui neque nisi nulla"
          ],
          [
            "userId" => 1,
            "id" => 3 . "i",
            "title" => "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body" => "et iusto sed quo iure
    voluptatem occaecati omnis eligendi aut ad
    voluptatem doloribus vel accusantium quis pariatur
    molestiae porro eius odio et labore et velit aut"
          ],
        ];

        /* Quin inserisco tutti i post  */
    
     $allPost =[];

     $allPost =[...$postInterni, ...$postsList];
       
        
        return $allPost;
      }
}
