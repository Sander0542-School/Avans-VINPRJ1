<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Robot
 * 
 * @property int $id
 * @property string $corridor
 * 
 * @property Collection|RobotQueue[] $robot_queues
 *
 * @package App\Models
 */
class Robot extends Model
{
	protected $table = 'robots';
	public $timestamps = false;

	protected $fillable = [
		'corridor'
	];

	public function robot_queues()
	{
		return $this->hasMany(RobotQueue::class);
	}
}
