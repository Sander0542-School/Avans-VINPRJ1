<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAddress
 * 
 * @property int $id
 * @property int $customer_id
 * @property string $street
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * 
 * @property Customer $customer
 *
 * @package App\Models
 */
class CustomerAddress extends Model
{
	protected $table = 'customer_addresses';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'street',
		'number',
		'city',
		'state',
		'country',
		'zipcode'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
