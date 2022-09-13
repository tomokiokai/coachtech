<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'genre_name' => '寿司'
        ];
        Genre::create($param);
        
        $param = [
            'genre_name' => '焼肉'
        ];
        Genre::create($param);

        $param = [
            'genre_name' => '居酒屋'
        ];
        Genre::create($param);

        $param = [
            'genre_name' => 'イタリアン'
        ];
        Genre::create($param);

        $param = [
            'genre_name' => 'ラーメン'
        ];
        Genre::create($param);
    }
}
