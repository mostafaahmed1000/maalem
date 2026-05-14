<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('jobs:deactivate-expired')]
#[Description('Deactivate job listings that have passed their expiration date')]
class DeactivateExpiredJobs extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = \App\Models\JobListing::where('is_active', true)
            ->whereNotNull('expires_at')
            ->where('expires_at', '<=', now())
            ->update(['is_active' => false]);

        $this->info("{$count} expired jobs have been deactivated.");
    }
}
