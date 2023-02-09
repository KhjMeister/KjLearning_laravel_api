<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 18; $i++) { 
            Article::create([
                'title' => 'New '. strval($i),
                'text' => 'A New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New HopeA New Hope',
                'image' => 'http://localhost:8000/images/courses/courses'. strval($i) . '.jpg',
                'price' => '2'.strval($i).'00'
            ]);
        }
    }
}
