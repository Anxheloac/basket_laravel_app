<?php

namespace App\Listeners\ElasticSearch;

use App\Repositories\CarRepository;
use App\Repositories\ElasticSearchRepository;
use App\Events\ElasticSearch\UpdateCarIndex as UpdateCarIndexEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCarIndex
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UpdateCarIndex  $event
     * @return void
     */
    public function handle(UpdateCarIndexEvent $event)
    {
        $carModel = $event->carModel;

        ElasticSearchRepository::updateIndex(CarRepository::ESC_INDEX_NAME, $carModel->id, [
            'name' => $carModel->make.' '.$carModel->model,
            'price' => $carModel->price,
            'registration_date' => $carModel->registration_date,
            'engine_size' => $carModel->engine_size,
        ]);
    }
}
