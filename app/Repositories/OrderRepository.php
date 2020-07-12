<?php

namespace App\Repositories;

use Auth;
use App\Models\Order;
use App\Repositories\BasketRepository;

/**
 * 
 */
class OrderRepository extends BaseRepository
{
	private $basketRepository;

	/**
	 * 
	 * @param Order $model
	 */
	public function __construct(Order $model, BasketRepository $basketRepository)
	{
		$this->model = $model;
		$this->basketRepository =  $basketRepository;
	}

	/**
	 * 
	 * @param  $request
	 * @return
	 */
	public function store($request)
	{
		$authUser = Auth::user();
		$basketData = json_decode(session()->get('basket'), true);

		if (is_null($basketData)) {
			throw new \Exception("Error Processing Request", 422);
		}

		$order = parent::create(['user_id' => $authUser->id]);

		foreach ($basketData as $key => $item) {
			$order->cars()->attach($item['car_id'], ['quantity' => $item['quantity']]);
		}

		$this->basketRepository->clearBasket();

		return $order;
	}
}