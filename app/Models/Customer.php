<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|CustomerAddress[] $customer_addresses
 * @property Collection|CustomerContact[] $customer_contacts
 * @property Collection|CustomerDiscount[] $customer_discounts
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function customer_addresses()
	{
		return $this->hasMany(CustomerAddress::class);
	}

	public function customer_contacts()
	{
		return $this->hasMany(CustomerContact::class);
	}

	public function customer_discounts()
	{
		return $this->hasMany(CustomerDiscount::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
