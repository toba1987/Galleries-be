<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Gallery::all()->each(function ($gallery){
            App\User::all()->each(function ($user) use ($gallery) {
                $gallery->images()->saveMany(factory(App\Image::class, 2)->make(['user_id' => $user->id]));
            });
        });
    }
}
