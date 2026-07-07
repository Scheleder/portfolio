<?php

namespace App\Listeners;

use App\Events\TipViewed;

class IncrementTipViewCount
{
    public function handle(TipViewed $event): void
    {
        // Increment visualisations count
        $event->tip->increment('view_count');
    }
}
