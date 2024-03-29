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
        'customer_id' => 'int',
    ];

    protected $dates = [
        'date',
    ];

    protected $fillable = [
        'customer_id',
        'customer_address_id',
        'date',
        'status',
    ];

    /**
     * Whether the order has a invoice
     *
     * @return bool
     */
    public function hasInvoice()
    {
        return $this->order_invoice != null;
    }

    /**
     * Get the discount of the customer based on the year of the order
     *
     * @return int
     */
    public function getCustomerDiscountAttribute()
    {
        return $this->customer->customer_discounts()->where('year', $this->date->year - 1)->first()->discount ?? 0;
    }

    /**
     * Get the discount based on the subtotal of the order
     *
     * @return int
     */
    public function getDiscountAttribute()
    {
        $subtotal = $this->subtotal;

        if ($subtotal > 500) {
            return 5;
        }

        return 0;
    }

    /**
     * Get the subtotal price of the order
     *
     * @return mixed
     */
    public function getSubtotalAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->quantity * $product->pivot->price;
        });
    }

    /**
     * Get the total price based on the subtotal and discounts
     *
     * @return float|int
     */
    public function getTotalAttribute()
    {
        $subtotal = $this->subtotal;

        $total = $subtotal / 100 * (100 - $this->discount);

        $total = $total / 100 * (100 - $this->customer_discount);

        return $total;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customer_address()
    {
        return $this->belongsTo(CustomerAddress::class);
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
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('id', 'price', 'quantity');
    }

    public function delete()
    {
        OrderProduct::whereOrderId($this->id)->delete();

        return parent::delete();
    }
}
