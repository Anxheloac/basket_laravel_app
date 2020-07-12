<?php

namespace App\Listeners\ElasticSearch;

use App\Repositories\CarRepository;
use App\Repositories\ElasticSearchRepository;
use App\Events\ElasticSearch\CreateCarIndex as CreateCarIndexEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCarIndex
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
     * @param  CreateCarIndex  $event
     * @return void
     */
    public function handle(CreateCarIndexEvent $event)
    {
        $carModel = $event->carModel;

        ElasticSearchRepository::createIndex(CarRepository::ESC_INDEX_NAME, $carModel->id, [
            'name' => $carModel->make.' '.$carModel->model,
            'price' => $carModel->price,
            'registration_date' => $carModel->registration_date,
            'engine_size' => $carModel->engine_size,
        ]);
    }
}
