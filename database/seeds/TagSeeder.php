<?php

use App\Model\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for ($i=0;$i<20;$i++)
        {
            $tag= new Tag();
            $tag->name=$faker->name;
            $tag->save();
        }
    }
}
