<?php

use App\Models\Car;
use App\Events\ElasticSearch\CreateCarIndex;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModel = Car::create([
        	'make' => 'BMV',
        	'model' => 'M5',
        	'registration_date' => now()->subYears(5),
        	'engine_size' => 2.0,
        	'price' => '7000',
        	'active' => true,
        	'tags' => 'red, 4doors'
        ]);

        try {
        	event(new CreateCarIndex($carModel));
        } catch (\Exception $e) {
        	\Log::error($e);
        }
    }
}
