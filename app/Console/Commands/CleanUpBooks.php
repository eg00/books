<?php

namespace App\Console\Commands;

use App\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CleanUpBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'books:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes books published over a year ago';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all = Book::count();
        $books = Book::where('published', '<=', Carbon::now()->subYears(1)->toDateString())->get();
        $count = $books->count();
        $books->each(function ($book){
            $book->authors()->detach();
            $book->delete();
        });
        echo "${count} of ${all} books deleted";
        return 0;
    }
}
