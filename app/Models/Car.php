<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	/**
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'make', 'model', 'registration_date', 'engine_size', 'price', 'active', 'tags'
    ];

    /**
     * 
     * @var array
     */
    protected $dates = ['registration_date'];

    /**
     * @param  
     * @return
     */
    public function scopeActive($query)
    {
    	return $query->where('active', 1);
    }

    /**
     * 
     * @return
     */
    public function getNameAttribute()
    {
        return $this->make.' '.$this->model;
    }
}
