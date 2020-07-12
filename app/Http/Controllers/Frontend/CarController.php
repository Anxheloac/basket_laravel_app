<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CarRepository;
use Illuminate\Http\Request;

class CarController extends Controller
{
	private $repository;

	public function __construct(CarRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * 
     * @param  Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
    	$cars = $this->repository->getActiveCars();
    	$search = $request->search;
        $searchForm['make'] = $request->make;
        $searchForm['model'] = $request->model;
        $searchForm['engine_size'] = $request->engine_size;
        
        $fromES = false;//from elastic search

    	if (!empty($searchForm['make']) || !empty($searchForm['model']) || !empty($searchForm['engine_size'])) {
            $cars = $this->repository->search($request, $searchForm);
        }
        
    	return view('frontend.cars', compact('cars', 'search', 'fromES', 'searchForm'));
    }
}
