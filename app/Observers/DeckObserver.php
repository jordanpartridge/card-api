<?php

namespace App\Observers;

use App\Models\Deck;

class DeckObserver
{
    /**
     * Handle the Deck "created" event.
     */
    public function created(Deck $deck): void
    {
        $deck->initialize();
    }

    public function creating(Deck $deck): void
    {
        $deck->slug = str($deck->name)->slug();
    }

    /**
     * Handle the Deck "updated" event.
     */
    public function updated(Deck $deck): void
    {
        //
    }

    /**
     * Handle the Deck "deleted" event.
     */
    public function deleted(Deck $deck): void
    {
        //
    }

    /**
     * Handle the Deck "restored" event.
     */
    public function restored(Deck $deck): void
    {
        //
    }

    /**
     * Handle the Deck "force deleted" event.
     */
    public function forceDeleted(Deck $deck): void
    {
        //
    }
}
