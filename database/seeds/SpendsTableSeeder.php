<?php

use Illuminate\Database\Seeder;

class SpendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Spend::class, 30)->create()->each(function($spend){

            $price = $spend->price;

            if($spend->price > 1000){

                $users = App\User::pluck('id')->all();
                $max = rand(2, count($users));
                $ids = [];
                while( count($ids) < $max){
                    $id = $users[rand(0,count($users) - 1)];
                    while(in_array($id, $ids)) $id = $users[rand(0,count($users) - 1)];
                    $ids[] = $id;
                }

                $spend->users()->attach($ids, ['price' => round($price/$max, 2)]);

            }

        });
    }
}
