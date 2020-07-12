<?php

namespace App\Http\Controllers\Frontend;

use Elasticsearch\ClientBuilder;
use App\Repositories\CarRepository;
use App\Repositories\BasketRepository;
use App\Http\Requests\UpdateBasketRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasketController extends Controller
{
	/**
	 * 
	 */
	private $repository;

	/**
	 * 
	 */
	private $carRepository;

	/**
	 * @param BasketRepository
	 * @param CarRepository
	 */
	public function __construct(BasketRepository $repository, CarRepository $carRepository)
	{
		$this->repository = $repository;
		$this->carRepository = $carRepository;
	}

	/**
	 * @return mixed
	 */
    public function viewBasket()
    {
    	$basketData = [];
    	
    	if (session()->has('basket')) {
    		$basketData = json_decode(session()->get('basket'), true);
    		$carIds = array_column($basketData, 'car_id');
    		$carsCollection = $this->carRepository->whereIn('id', $carIds)->get();
    		foreach ($basketData as $key => $carArray) {
    			$basketData[$key]['carModel'] = $carsCollection->where('id', $carArray['car_id'])->first();
    		}
    	}

    	return view('frontend.basket', compact('basketData'));
    }

    /**
     * @param Request
     */
    public function addToBasket(Request $request)
    {
    	if (!$request->has('car_id')) {
    		return response()->json(['Missing car id'], 404);
    	}

    	$this->repository->addToBasket($request->car_id);
    }

    /**
     * @param  Request
     * @return 
     */
    public function update(UpdateBasketRequest $request)
    {
    	$this->repository->updateBasket($request->except('_token'));

    	return redirect()->route('frontend.basket.view')->with([
    		'message' => 'The basket is updated!',
    		'type' => 'success'
    	]);
    }

    /**
     * @param  
     * @return 
     */
    public function removeItem($carId)
    {
    	$this->repository->removeItem($carId);

    	return redirect()->route('frontend.basket.view')->with([
    		'message' => 'The item is removed from basket!',
    		'type' => 'success'
    	]);
    }

    /**
     * @return void
     */
    public function clear()
    {
    	$this->repository->clearBasket();
    }

    /**
     * @todo remove
     * @return 
     */
    public function test()
    {
        $data = [
            'body' => [
                'testField' => 'abc'
            ],
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
        ];

        $client = ClientBuilder::create()->build();
        $return = $client->index($data);
    }


}
