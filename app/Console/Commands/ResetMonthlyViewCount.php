<?php

namespace App\Console\Commands;

use App\Models\View;
use Illuminate\Console\Command;

class ResetMonthlyViewCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:monthly-view-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset monthly_view_count column to 0 in the views table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        View::query()->update(
            ['monthly_view_count' => 0]
        );

        $this->info('monthly_view_count column reset to 0.');
    }
}
