<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\OrderRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	/**
	 * 
	 * @var
	 */
	private $repository;

	public function __construct(OrderRepository $repository){
		$this->repository = $repository;
	}

	/**
	 * 
	 * @return
	 */
	public function index()
	{
		$orders = $this->repository->with('user')->withCount('cars')->get();
		return view('admin.orders.index', compact('orders'));
	}
}
