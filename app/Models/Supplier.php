<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $website
 * 
 * @property Collection|SupplierContact[] $supplier_contacts
 * @property Collection|SupplierOrder[] $supplier_orders
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'suppliers';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'street',
		'number',
		'city',
		'state',
		'country',
		'zipcode',
		'website'
	];

	public function supplier_contacts()
	{
		return $this->hasMany(SupplierContact::class);
	}

	public function supplier_orders()
	{
		return $this->hasMany(SupplierOrder::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class, 'supplier_products')
					->withPivot('price');
	}
}
