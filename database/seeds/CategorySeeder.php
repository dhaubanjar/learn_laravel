<?php

use Illuminate\Database\Seeder;
use App\Model\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for($i=0;$i<20;$i++){
            $category=new Category();
            $category->name=$faker->name;
            $category->save();
        }
    }
}
