<?php

use Illuminate\Database\Seeder;
use App\Photo;
use App\User;

use Illuminate\Support\Facades\Storage;


class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user =  User::inRandomOrder()->first();
        // $photo = new Photo;
        // $photo->user_id = $user->id;
        // $photo->name = 'Lorem Ipsum';

        // //prendiamo i file nella nostra cartella
        // $files = Storage::disk('public')->files('images');
        // $photo->path = $files[rand(0, count($files) - 1)];;

        // $photo->description = 'Lorem ipsum';
        // $photo->save();

        //prendiamo i file nella nostra cartella
        $files = Storage::disk('public')->files('images');
        foreach ($files as $file) {
            $user =  User::inRandomOrder()->first();
            $photo = new Photo;
            $photo->user_id = $user->id;
            $photo->name = 'Lorem Ipsum';
            $photo->path = $file;
            $photo->description = 'Lorem ipsum';
            $photo->save();
        }
    }
}
