<?php

namespace App\Events;

use App\Models\Tip;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TipViewed
{
    use Dispatchable, SerializesModels;

    public Tip $tip;

    public function __construct(Tip $tip)
    {
        $this->tip = $tip;
    }
}
