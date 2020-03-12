<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SupplierContact
 * 
 * @property int $id
 * @property int $supplier_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $jobtitle
 * 
 * @property Supplier $supplier
 *
 * @package App\Models
 */
class SupplierContact extends Model
{
	protected $table = 'supplier_contacts';
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int'
	];

	protected $fillable = [
		'supplier_id',
		'name',
		'email',
		'phone',
		'jobtitle'
	];

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}
}
