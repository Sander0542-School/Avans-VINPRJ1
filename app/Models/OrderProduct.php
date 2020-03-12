<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * 
 * @property Order $order
 * @property Product $product
 * @property Collection|RobotQueue[] $robot_queues
 *
 * @package App\Models
 */
class OrderProduct extends Model
{
	protected $table = 'order_products';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'price' => 'float',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'price',
		'quantity'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function robot_queues()
	{
		return $this->hasMany(RobotQueue::class);
	}
}
