<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $factory = Factory::create();
        for ($i = 0 ; $i<5;$i++){
            User::create([
                'first_name' => $factory->firstName,
                'tc_no' => $factory->numberBetween(0,99999999999),
                'last_name' => $factory->lastName,
                'age' => $factory->numberBetween(18,50),
                'city' => $factory->city,
                'phone_number' => $factory->phoneNumber,
                'email' => $factory->email,
                'password' => bcrypt($factory->password)
            ]);
        }

        for ($i = 0 ; $i<5;$i++){
            Category::create([
                'title' => $factory->sentence,
                'content' => $factory->sentence,
                'is_active' => 1
            ]);
        }

        for ($i = 0 ; $i<5;$i++){
            Post::create([
                'author_id' => $factory->numberBetween(User::first()->id, User::orderByDesc('id')->first()->id),
                'category_id' => $factory->numberBetween(Category::first()->id, Category::orderByDesc('id')->first()->id),
                'title' => $factory->sentence,
                'content' => $factory->sentence,
                'is_active' => 1
            ]);



        }
        User::create([
            'tc_no' => '34521832455',
            'first_name' => 'ahmet',
            'last_name' => 'demir',
            'age' => 24,
            'city' => 'İstanbul',
            'phone_number' => '05554321356',
            'email' => 'ahmet34@gmail.com',
            'password' => bcrypt('34343434')
        ]);
        User::create([
            'tc_no' => '32521832455',
            'first_name' => 'mehmet',
            'last_name' => 'çelik',
            'age' => 27,
            'city' => 'Sakarya',
            'phone_number' => '05564321356',
            'email' => 'mehmet54@gmail.com',
            'password' => bcrypt('5454545454')
        ]);
        User::create([
            'tc_no' => '39921832455',
            'first_name' => 'ayşe',
            'last_name' => 'metal',
            'age' => 27,
            'city' => 'Bursa',
            'phone_number' => '05599321356',
            'email' => 'ayse16@gmail.com',
            'password' => bcrypt('16161616')
        ]);
        User::create([
            'tc_no' => '34526832455',
            'first_name' => 'mehmet',
            'last_name' => 'kum',
            'age' => 24,
            'city' => 'Eskişehir',
            'phone_number' => '05526321356',
            'email' => 'mehmet26@gmail.com',
            'password' => bcrypt('26262626')
        ]);

        Category::create([
            'title' => 'Futbol',
            'content' => 'Bu sene şampiyon kim olacak?',
            'is_active' =>1,

        ]);
        Category::create([
            'title' => 'Basketbol',
            'content' => 'LeBron James yine sahnede',
            'is_active' =>1,

        ]);
        Category::create([
            'title' => 'Masa Tenisi',
            'content' => 'Favori olan Xu Xin bu sefer kupayı kazanabilecek mi?',
            'is_active' =>1,

        ]);

        Post::create([
            'author_id' => 6,
            'category_id' => 6,
            'title' =>'Şok transfer',
            'content' =>'Bu sene çok iyi performans sergileyen Ronaldo Man.Utd a gitti',
            'is_active' =>1,

        ]);

        Post::create([
            'author_id' => 7,
            'category_id' => 7,
            'title' =>'Hüzün bir gün',
            'content' =>'Final four için Berlin e giden CSKA takım otobüsü kaza yaptı',
            'is_active' =>1,

        ]);

        Post::create([
            'author_id' => 8,
            'category_id' => 8,
            'title' =>'İnanılmaz bir sakatlık',
            'content' =>'2022 dünya şampiyonasına cok iyi hazırlanan her gün antreman yapan Ma Long sinirlenerek cama yumruk attı ve elini kesti',
            'is_active' =>1,

        ]);

    }
}
