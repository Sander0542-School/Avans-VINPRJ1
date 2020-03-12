<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierProduct
 * 
 * @property int $supplier_id
 * @property int $product_id
 * @property float $price
 * 
 * @property Product $product
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class SupplierProduct extends Model
{
	protected $table = 'supplier_products';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int',
		'product_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'price'
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
