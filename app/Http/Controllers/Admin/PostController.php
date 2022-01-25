<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private function generateSlug($title) {
        $slug = Str::slug($title);
    
        // controllo se esiste un post con lo stesso slug
        $alreadyExists = Post::where("slug", $slug)->first();
        $counter = 1;
    
        // Se esiste, devo creare un nuovo slug
        while ($alreadyExists) {
          // genera un nuovo slug
          $newSlug = $slug . "-" . $counter;
    
          // cerca a db se esiste già un elemento con questo nuovo slug
          $alreadyExists = Post::where("slug", $newSlug)->first();
    
          // incrementiamo il contatore
          $counter++;
    
          // se non è stato trovato alcun post,
          // salvo il nuovo slug dentro la variable $slug;
          if (!$alreadyExists) {
            $slug = $newSlug;
          }
        }
        return $slug;
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Auth::user()->role;
        $postList = []; 
        
        $categories =Category::all();

        if ($role === 'admin'){
            $postList = Post::all();
        } else {
            $postList =Post::where("user_id", Auth::user()->id)->get();
        }

        return view('admin.posts.index', [
                                'postList'=>$postList,
                                'categories'=>$categories,
                               
                         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Category::all();

        $tags = Tag::all(); 

        return view('admin.posts.create', [
            'categories'=>$categories,
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        
        $data = $request->all(); 
        $post = new Post();

        $post->fill($request->all());

        $post->slug=$this->generateSlug($data['title']); /* Richiamo la funzione slug */

        $post->user_id = Auth::user()->id; /* Qui specifico l'utente */
        $post->save();

        if(key_exists("tags",$data)){

            $post->tags()->sync($data["tags"]);

        }

    
        return redirect()->route("admin.posts.index")->with('status','Post Creato Correttamente .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post =Post::where("slug",$slug)->first();

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();
        
        $categories =Category::all();

        $tags = Tag::all(); 

        return view("admin.posts.edit", [
            'post' =>$post,
            'categories'=>$categories,
            'tags'=>$tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $slug)
    {
        $post = Post::where("slug", $slug)->first();
        $data = $request->all();
        $oldTitle = $post->title;
        $titleChanged = $oldTitle != $data["title"];

       /*  $post->update($data); per non salvare due volte uso prima fill e poi save */

        $post->fill($data);

        if($titleChanged){
            $post->slug = $this->generateSlug($data["title"]);
        }
        $post->save();

        if(key_exists("tags",$data)){

            $post->tags()->sync($data["tags"]);

        }

        return redirect()->route("admin.posts.index")->with(["status" , "Post aggiornati correttamente!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $post->tags->detach();
        $post->delete();

        return redirect()->route("admin.post.index")->with('status','Post cancellato');
    }
}
