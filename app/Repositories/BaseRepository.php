<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }


    /**
     * 
     * @return mixed
     */
    public function all()
    {
    	return $this->model->all();
    }

    /**
     * 
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * 
     */
    public function paginate($page = 10)
    {
        return $this->model->paginate($page);
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return Model
     */
    public function update($id, array $attributes)
    {
    	return $this->model->findOrFail($id)->update($attributes);
    }

    /**
     * 
     */
    public function delete($id)
    {
    	$this->model->find($id)->delete();
    }
 
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * 
     * @param  $column
     * @param  array  $values
     * @return mixed
     */
    public function whereIn($column, array $values)
    {
        return $this->model->whereIn($column, $values);
    }

    /**
     * 
     * @param $relation
     * @return
     */
    public function with($relation)
    {
        return $this->model->with($relation);
    }

    /**
     * 
     * @param $relation
     * @return
     */
    public function withCount($relation)
    {
        return $this->model->withCount($relation);
    }
}