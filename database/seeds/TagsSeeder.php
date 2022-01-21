<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['cult','art','trend','top','out'];

        foreach ($tags as $tag) {
            
            $new_tag = new Tag();
            $new_tag->name=$tag;
            $new_tag->save(); 

        }
    }
}
