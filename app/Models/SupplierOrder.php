<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierOrder
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $product_id
 * @property int $amount
 * @property float $price
 * @property Carbon $date
 *
 * @property Product $product
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class SupplierOrder extends Model
{
	protected $table = 'supplier_orders';
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'price' => 'float'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'supplier_id',
		'product_id',
		'quantity',
		'price',
		'date'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}
}
