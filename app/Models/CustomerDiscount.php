<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerDiscount
 * 
 * @property int $customer_id
 * @property int $year
 * @property int $discount
 * 
 * @property Customer $customer
 *
 * @package App\Models
 */
class CustomerDiscount extends Model
{
	protected $table = 'customer_discounts';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int',
		'year' => 'int',
		'discount' => 'int'
	];

	protected $fillable = [
		'discount'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
