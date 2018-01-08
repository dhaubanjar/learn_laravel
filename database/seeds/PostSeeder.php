<?php

use Illuminate\Database\Seeder;
use App\Model\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for($i=0;$i<100;$i++){
            $name=$faker->name;
            $post=new Post();
            $post->title=$name;
            $post->slug=str_slug($name);
            $post->image=$faker->imageUrl();
            $post->content=$faker->text(250);
            $post->category_id=$faker->numberBetween(1,20);
            $post->save();
        }
    }
}
