<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SlugPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts=Post::all();

        foreach ($posts as $post) {
            
            $slug = Str::slug($post->title); 

            $alreadyExists = Post::where("slug", $slug)->first();
            $counter = 1;

            while($alreadyExists) { /* Se esiste lo modifica aggiungendo 1 e ricontrolla */
                $newSlug = $slug . "-" . $counter;

                $alreadyExists = Post::where("slug", $newSlug)->first();

                $counter ++;
                if(!$alreadyExists){ /* Se non esiste  assegna $newSlug a $slug */
                    $slug = $newSlug;
                }
            }

            $post->slug =$slug;
            $post->save();
        }


    }
}
