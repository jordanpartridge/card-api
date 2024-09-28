<?php

namespace App\Console\Commands;

use App\Models\Deck;
use Exception;
use Illuminate\Console\Command;

class CleanUpDecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'decks:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove decks at the defined stale threshold';

    /**
     * Execute the console command.
     *
     * @throws Exception
     */
    public function handle(): void
    {
        $threshold = config('app.unused_deck_deletion_threshold');
        if (! $threshold) {
            throw new Exception('Failed to execute: ' . $this->signature . ' Threshold not set');
        }
        try {
            $deleteCount = Deck::query()
                ->where('updated_at', '<', now()
                    ->subHours($threshold))
                ->delete();
            $this->info('Deleted ' . $deleteCount . ' decks');
        } catch (Exception $exception) {
            throw new Exception('Failed to execute: ' . $this->signature . ' ' . $exception->getMessage());
        }
    }
}
