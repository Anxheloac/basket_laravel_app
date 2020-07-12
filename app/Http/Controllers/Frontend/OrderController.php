<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	/**
	 * 
	 * @var
	 */
	private $repository;

	/**
	 * 
	 * @param OrderRepository $repository
	 */
	public function __construct(OrderRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * 
	 * @param  Request $request
	 * @return
	 */
    public function store(Request $request)
    {
    	return $this->repository->store($request);
    }
}
