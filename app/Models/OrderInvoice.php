<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderInvoice
 * 
 * @property int $order_id
 * @property bool $paid
 * 
 * @property Order $order
 *
 * @package App\Models
 */
class OrderInvoice extends Model
{
	protected $table = 'order_invoices';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'paid' => 'bool'
	];

	protected $fillable = [
		'paid'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
