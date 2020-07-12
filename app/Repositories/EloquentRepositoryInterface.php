<?php

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

/**
* Interface EloquentRepositoryInterface
* @package App\Repositories
*/
interface EloquentRepositoryInterface
{

   public function all();

   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param string id
    * @param array $attributes
    */
   public function update($id, array $attributes);

   /**
    * 
    */
   public function delete($id);

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ?Model;
}