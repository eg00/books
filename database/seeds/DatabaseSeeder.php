<?php

use App\Author;
use App\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
       $authors =  factory(Author::class, 30)->create()
            ->each(static function ($author) {
                $author->books()
                    ->sync(factory(Book::class, \random_int(1, 4))->create());
            });
       $authors->each(function ($author){
           $author->books()->attach(Book::inRandomOrder()->limit(\random_int(0, 4))->pluck('id'));
       });
    }
}
