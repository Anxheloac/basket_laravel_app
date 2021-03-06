<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * 
 */
class Order extends Model
{
	/**
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'user_id'
    ];

    /**
     * 
     * @return
     */
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 
     * @return
     */
    public function cars()
    {
    	return $this->belongsToMany(Car::class, 'order_car')->withPivot('quantity');
    }

    /**
     * 
     * @return
     */
    public function totalAmount()
    {
        $cars = $this->cars;
        
        return $this->cars->sum(function($carItem){
            return $carItem->price*$carItem->pivot->quantity;
        });
    }

    /**
     * 
     * @return
     */
    public function numberOfCars()
    {
        return $this->cars->sum(function($carItem){
            return $carItem->pivot->quantity;
        });
    }
	
}