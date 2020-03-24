<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property int $ordercode
 * @property float $price
 * @property string $short_description
 * @property string $long_description
 * @property string $active_substances
 * @property string $location
 * @property int $stock
 * @property int $minimum_stock
 * @property int $order_quantity
 * @property float $packaging_length
 * @property float $packaging_width
 * @property float $packaging_heigth
 * @property int $consumer_packages
 * @property string $packaging_type
 *
 * @property Collection|Order[] $orders
 * @property Collection|SupplierOrder[] $supplier_orders
 * @property Collection|Supplier[] $suppliers
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	public $timestamps = false;

	protected $casts = [
		'ordercode' => 'int',
		'price' => 'float',
		'stock' => 'int',
		'minimum_stock' => 'int',
		'order_quantity' => 'int',
		'packaging_length' => 'float',
		'packaging_width' => 'float',
		'packaging_height' => 'float',
		'consumer_packages' => 'int'
	];

	protected $fillable = [
		'name',
		'ordercode',
		'price',
		'short_description',
		'long_description',
		'active_substances',
		'location',
		'stock',
		'minimum_stock',
		'order_quantity',
		'packaging_length',
		'packaging_width',
		'packaging_height',
		'consumer_packages',
		'packaging_type'
	];

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'order_products')
					->withPivot('id', 'price', 'quantity');
	}

	public function supplier_orders()
	{
		return $this->hasMany(SupplierOrder::class);
	}

	public function suppliers()
	{
		return $this->belongsToMany(Supplier::class, 'supplier_products')
					->withPivot('price');
	}
}
