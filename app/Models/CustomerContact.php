<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerContact
 * 
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $jobtitle
 * 
 * @property Customer $customer
 *
 * @package App\Models
 */
class CustomerContact extends Model
{
	protected $table = 'customer_contacts';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'name',
		'email',
		'phone',
		'jobtitle'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
