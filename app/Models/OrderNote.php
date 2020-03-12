<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderNote
 * 
 * @property int $id
 * @property int $order_id
 * @property string $notes
 * 
 * @property Order $order
 *
 * @package App\Models
 */
class OrderNote extends Model
{
	protected $table = 'order_notes';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'notes'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
