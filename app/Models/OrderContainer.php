<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderContainer
 * 
 * @property int $order_id
 * @property string $containercode
 * 
 * @property Order $order
 *
 * @package App\Models
 */
class OrderContainer extends Model
{
	protected $table = 'order_containers';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
