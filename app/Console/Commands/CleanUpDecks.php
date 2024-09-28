<?php

namespace App\Console\Commands;

use App\Models\Deck;
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
     */
    public function handle()
    {
        Deck::query()
            ->where('updated_at', '<', now()
                ->subHours(config('app.unused_deck_deletion_threshold')))
            ->delete();
    }
}
