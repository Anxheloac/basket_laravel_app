<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\ElasticSearchRepository;
use App\Events\ElasticSearch\CreateCarIndex as EscStoreCarIndexEvent;
use App\Events\ElasticSearch\UpdateCarIndex as EscUpdateCarIndexEvent;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 */
class CarRepository extends BaseRepository
{
    /**
     * 
     */
    public const ESC_INDEX_NAME = 'cars';
	
	public function __construct(Car $model)
	{
		parent::__construct($model);
	}

    /**
     * 
     * @param $request
     * @return
     */
    public function search($request, array $searchForm = [])
    {
        $parameters = [
            'query' => [ 'bool' => []]
        ];
        //check if escError
        $escError = false;

        if (!empty($searchForm['make'])) {
            $parameters['query']['bool']['should'] = [
                'wildcard' => [
                    'name' => [
                        "value" => '*'.$searchForm['make'].'*',
                    ]
                ]
            ];
        }

        if (!empty($searchForm['model'])) {
            $parameters['query']['bool']['should'] = [
                'wildcard' => [
                    'name' => [
                        "value" => '*'.$searchForm['model'].'*',
                    ]
                ]
            ];
        }

        if (!empty($searchForm['engine_size'])) {
            $parameters['query']['bool']['must'] = [
                "term" => [ "engine_size" => $searchForm['engine_size'] ]
            ];
        }

        try {
            $results = ElasticSearchRepository::search(self::ESC_INDEX_NAME, $parameters);
        } catch (\Exception $e) {
            \Log::error($e);
            $escError = true;
        }

        //if there is error with elastic search 
        // filter from db
        if ($escError) {
            $query = $this->model->newQuery();
            if (!empty($searchForm['make'])) {
                $query->where('make', $searchForm['make']);
            } elseif (!empty($searchForm['model'])) {
                $query->where('model', $searchForm['model']);
            } elseif (!empty($searchForm['engine_size'])) {
                $query->where('engine_size', $searchForm['engine_size']);
            }

            return $query->get();
        }

        $formmatedResults = [];
        
        if (!empty($results)) {
            foreach ($results as $key => $value) {
                //get car array from elastic search
                //convert to an object
                // adjust to car collection
                $carObject = (object) $value['_source'];
                $carObject->registration_date = \Carbon\Carbon::parse($carObject->registration_date);
                $carObject->id = (int) $value['_id'];
                $formmatedResults[] = $carObject;
            }
        }

        return $formmatedResults;
    }

	/**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
    	if (!isset($attributes['active'])) {
    		$attributes['active'] = false;
    	}

        $carModel = parent::create($attributes);
        
        try {
            event(new EscStoreCarIndexEvent($carModel));
        } catch (\Exception $e) {
            \Log::error($e);
        }

        return $carModel;
    }

     /**
     * @param $id
     * @param array $attributes
     * @return Model
     */
    public function update($id, array $attributes)
    {
    	if (!isset($attributes['active'])) {
    		$attributes['active'] = false;
    	}

        try {
            
            $carModel = $this->find($id);
            parent::update($id, $attributes);
            event(new EscUpdateCarIndexEvent($carModel));
        } catch (\Exception $e) {
            \Log::error($e);
        }

    	return $carModel;
    }

    /**
     * @param  
     * @return
     */
    public function getActiveCars($page = 10)
    {
        return $this->model->active()->paginate($page);
    }
}