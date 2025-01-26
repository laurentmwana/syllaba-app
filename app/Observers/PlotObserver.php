<?php

namespace App\Observers;

use App\Models\Plot;

class PlotObserver
{
    /**
     * Handle the Plot "created" event.
     */
    public function created(Plot $plot): void
    {
        for ($index = 1; $index <= $plot->number_hourses; $index++) {
            $plot->houses()->create(['name' => "Maison {$index}"]);
        }
    }
}
