<?php

use Illuminate\Database\Seeder;
use Simple_Blog\Article;
class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 1; $i <= 5 ; $i ++) {
        	Article::create([
        		'title'   => $faker->text(rand(67,77)),
        		'content' => $faker->text(rand(167,177))
        		]);
        }
    }
}
