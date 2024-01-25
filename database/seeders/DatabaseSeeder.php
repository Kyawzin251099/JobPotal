<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::truncate();
        User::factory(20)->create();
        Company::factory(20)->create();
        Job::factory(20)->create();


    $categories =[
        'Technology',
        'Engineering',
        'Goverment',
        'Medical',
        'Construction',
        'Software'
    ];
    foreach($categories as $category){
        Category::create(['name'=>$category]);
    }

    Role::truncate();
    $adminRole =Role::create(['name'=>'admin']);
    $admin = User::create([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'password'=>bcrypt('password123'),
        'email_verified_at'=>NOW()
    ]);
    $admin->roles()->attach($adminRole);
    }

}
