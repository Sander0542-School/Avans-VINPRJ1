<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RobotQueue
 * 
 * @property int $robot_id
 * @property int $order_product_id
 * 
 * @property Robot $robot
 * @property OrderProduct $order_product
 *
 * @package App\Models
 */
class RobotQueue extends Model
{
	protected $table = 'robot_queue';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'robot_id' => 'int',
		'order_product_id' => 'int'
	];

	public function robot()
	{
		return $this->belongsTo(Robot::class);
	}

	public function order_product()
	{
		return $this->belongsTo(OrderProduct::class);
	}
}
