<?php

namespace App\Repositories;

/**
 * 
 */
class BasketRepository
{

	/**
	 * @param integer
	 */
	public function addToBasket($basketId)
	{
		$basketData = session()->get('basket');
		$toAdd = [
			'car_id' => $basketId,
			'quantity' => 1
		];
		$toUpdate = false;

		if (is_null($basketData)) {
			$basketData = [];
			$basketData[] = $toAdd;
		} else {
			$basketData = json_decode($basketData, true);

			foreach ($basketData as $key => $basketItem){

				if ($basketItem['car_id'] == $basketId) {
					$basketData[$key]['quantity']++;
					$toUpdate = true;
					break;
				}
			}

			if (!$toUpdate) {
				$basketData[] = $toAdd;
			}
		}

		session()->put('basket', json_encode($basketData));
	}

	/**
	 * @param  
	 * @return
	 */
	public function updateBasket($input)
	{
		
		$items = $input['items'];
		$basketData = json_decode(session()->get('basket'), true);

		foreach ($basketData as $key => $item) {
			$basketData[$key]["quantity"] = $items[$item["car_id"]]["quantity"] ?? $item["quantity"];
		}

		session()->put('basket', json_encode($basketData));
	}

	/**
	 * @param  integer
	 * @return void
	 */
	public function removeItem($carId)
	{
		$basketData = json_decode(session()->get('basket'), true);
    	$foundItem = array_filter($basketData, function($item) use ($carId){
    		return $item['car_id'] == $carId;
    	});
    	
    	if ($foundItem) {
    		unset($basketData[array_keys($foundItem)[0]]);
    		session()->put('basket', json_encode($basketData));
    	} else {
    		// throw new \Exception("Not found", 404);
    		
    	}
	}

	/**
	 * Remove all basket items
	 * @return
	 */
	public function clearBasket()
	{
		session()->forget('basket');
	}
}