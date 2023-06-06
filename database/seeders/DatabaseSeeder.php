<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Comic;
use App\Models\Category;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Andrew Joan',
                'username' => 'Andrew Joan',
                'role_id' => 1,
                'email' => 'pelukguling123@gmail.com',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'David Joan',
                'username' => 'David Joan',
                'role_id' => 2,
                'email' => 'Pringles7@gmail.com',
                'password' => bcrypt('12345')
            ]
        ]);

        User::factory(3)->create();

        Category::insert([
            ['name' => 'Manhwa'],
            ['name' => 'Manhua'],
            ['name' => 'Insert']
        ]);

        Role::insert([
            ['name' => 'User'],
            ['name' => 'Admin']
        ]);

        Author::insert([
            ['name' => 'Hanjoong Wolya'],
            ['name' => 'Author1'],
            ['name' => 'Author2'],
            ['name' => 'Author3'],
            ['name' => 'Author4'],
            ['name' => 'Author5'],
        ]);

        Comic::factory(25)->create();
    }
}
