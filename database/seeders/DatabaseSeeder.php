<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {



        User::factory()->create();
        Post::factory(5)->create();

         /* $personal= Category::create(
             [
                 'name' => 'personal',
                 'slug' => 'personal'
             ]
         );
         $professional = Category::create(
            [
                'name' => 'professional',
                'slug' => 'professional'
            ]
        );
        $hobby = Category::create(
            [
                'name' => 'hobby',
                'slug' => 'hobby'
            ]
        );
        Post::create(
            [
                'user_id'=>$user->id,
                'category_id'=> $personal->id,
                'title'=>'This is personal post',
                'slug'=>'first-post',
                'excerpt'=>'<p> Id porro nihil ignota vel.</p>',
                'body'=>'<p> Id porro nihil ignota vel. Scriptorem disputando eam ad. Dico euripidis nec te, ius nostro nusquam perfecto ne. Id voluptua delectus has. Eum te ullum prodesset gloriatur, ea eius expetendis pri, et nec quas modus assentior. Ex ius noster suscipit, etiam altera luptatum ea his.</p>'
            ]
        );

        Post::create(
            [
                'user_id'=>$user->id,
                'category_id'=> $professional->id,
                'title'=>'This is professional post',
                'slug'=>'second-post',
                'excerpt'=>'<p> Id porro nihil ignota vel. </p>',
                'body'=>'<p> Id porro nihil ignota vel. Scriptorem disputando eam ad. Dico euripidis nec te, ius nostro nusquam perfecto ne. Id voluptua delectus has. Eum te ullum prodesset gloriatur, ea eius expetendis pri, et nec quas modus assentior. Ex ius noster suscipit, etiam altera luptatum ea his.</p>'
            ]
        );

        Post::create(
            [
                'user_id'=>$user->id,
                'category_id'=> $hobby->id,
                'title'=>'This is a post about hobby',
                'slug'=>'third-post',
                'excerpt'=>'Id porro nihil ignota vel.',
                'body'=>'Id porro nihil ignota vel. Scriptorem disputando eam ad. Dico euripidis nec te, ius nostro nusquam perfecto ne. Id voluptua delectus has. Eum te ullum prodesset gloriatur, ea eius expetendis pri, et nec quas modus assentior. Ex ius noster suscipit, etiam altera luptatum ea his.'
            ]
        );*/
    }
}
