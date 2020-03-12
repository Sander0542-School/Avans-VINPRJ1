<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $customer_id
 * @property Carbon $date
 * @property string $status
 * 
 * @property Customer $customer
 * @property Collection|OrderContainer[] $order_containers
 * @property OrderInvoice $order_invoice
 * @property Collection|OrderNote[] $order_notes
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'customer_id',
		'date',
		'status'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function order_containers()
	{
		return $this->hasMany(OrderContainer::class);
	}

	public function order_invoice()
	{
		return $this->hasOne(OrderInvoice::class);
	}

	public function order_notes()
	{
		return $this->hasMany(OrderNote::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class, 'order_products')
					->withPivot('id', 'price', 'quantity');
	}
}
