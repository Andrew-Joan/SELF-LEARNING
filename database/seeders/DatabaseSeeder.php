<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Comic;
use App\Models\Author;
use App\Models\Status;
use App\Models\Chapter;
use App\Models\Release;
use App\Models\Category;
use App\Models\Genre;
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
            ['name' => 'Manga']
        ]);

        Genre::insert([
            ['name' => 'Action'],
            ['name' => 'Adventure'],
            ['name' => 'Fantasy'],
            ['name' => 'Game'],
            ['name' => 'Martial Arts'],
            ['name' => 'Murim'],
            ['name' => 'Revenge'],
            ['name' => 'System'],
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

        Status::insert([
            ['name' => 'Ongoing'],
            ['name' => 'Hiatus'],
            ['name' => 'Ended']
        ]);

        Release::insert([
            ['year' => 2019],
            ['year' => 2020],
            ['year' => 2021],
            ['year' => 2022],
            ['year' => 2023]
        ]);

        Comic::factory(25)->create();

        // Chapter::insert([
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 3,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 4,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 5,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 6,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 7,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 1',
        //         'comic_id' => 8,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 2,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 3,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 4,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 5,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 6,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 7,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 2',
        //         'comic_id' => 8,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 3',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 4',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 5',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 6',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 7',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 8',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 9',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 10',
        //         'comic_id' => 1,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 3',
        //         'comic_id' => 25,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 4',
        //         'comic_id' => 25,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 5',
        //         'comic_id' => 25,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 6',
        //         'comic_id' => 26,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 7',
        //         'comic_id' => 26,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 8',
        //         'comic_id' => 26,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 9',
        //         'comic_id' => 27,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        //     [
        //         'number' => 'Chapter 10',
        //         'comic_id' => 27,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ],
        // ]);
    }
}
