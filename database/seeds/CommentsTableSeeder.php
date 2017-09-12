<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Gallery::all()->each(function ($gallery){
            App\User::all()->each(function ($user) use ($gallery) {
                $gallery->comments()->saveMany(factory(App\Comment::class, 1)->make(['user_id' => $user->id]));
            });
        });
    }
}
