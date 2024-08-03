<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;


class UpdateMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Movie::query()->update(['deleted_at' => now()]);
        $this->info('All movie records have been soft deleted.');
    }
}
